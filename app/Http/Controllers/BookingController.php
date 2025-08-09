<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /* user bookings*/
    public function index()
    {
        $bookings = Booking::with('service')
            ->where('user_id', Auth::id())
            ->get();

        return view('bookings.index', compact('bookings'));
    }

    /* create a booking*/
    public function create(Request $request)
    {
        $type = $request->query('type');
        $services = Service::all();
        $user = Auth::user();

        return view('bookings.create', compact('services', 'type', 'user'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'date' => 'required|date|after:today',
            'time' => 'required',
            'phone' => 'required|string',
            'notes' => 'nullable|string',
        ]);
        $user = Auth::user();
        Booking::create([
            'user_id' => Auth::id(),
            'service_id' => $validated['service_id'],
            'date' => $validated['date'],
            'time' => $validated['time'],
            'status' => 'pending',
            'name'       => $user->name,
            'email'      => $user->email,
            'phone' => $validated['phone'],
            'notes' => $validated['notes'],
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully!');
    }
    /* displaying user stats*/
    public function userDashboard()
    {
        $userId = Auth::id();

        $totalBookings = Booking::where('user_id', $userId)->count();
        $pendingBookings = Booking::where('user_id', $userId)->where('status', 'pending')->count();
        $completedBookings = Booking::where('user_id', $userId)->where('status', 'completed')->count();

        return view('home', compact('totalBookings', 'pendingBookings', 'completedBookings'));
    }
    /* show booking details*/
    public function show(Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access.');
        }

        $booking->load('service');

        return view('bookings.show', compact('booking'));
    }
    /* for user to cancel booking*/
    public function userCancel(Booking $booking)
    {
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        if ($booking->status === 'completed') {
            return redirect()->route('bookings.index')
                ->with('error', 'You cannot cancel a completed booking.');
        }
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking cancelled successfully.');
    }

    /* admin controls*/
    public function adminIndex()
    {
        $pendingBookings = Booking::with(['user', 'service'])
            ->where('status', 'pending')
            ->get();

        $confirmedBookings = Booking::with(['user', 'service'])
            ->where('status', 'confirmed')
            ->get();

        $completedBookings = Booking::with(['user', 'service'])
            ->where('status', 'completed')
            ->get();



        return view('admin.bookings', compact('pendingBookings', 'confirmedBookings', 'completedBookings'));
    }
    /* for admins to also accpt bookings*/
    public function adminAcceptBooking(Booking $booking)
    {
        if ($booking->status === 'pending') {
            $booking->update(['status' => 'confirmed']);
        }
        return redirect()->route('admin.bookings.index')->with('success', 'Booking accepted.');
    }
    /* for admins to update booking status*/
    public function adminUpdate(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'status' => 'required|in:confirmed,completed',
        ]);

        $booking->update($validated);

        return redirect()->route('admin.bookings.index')->with('success', 'Booking updated.');
    }
    /* for admins to see booking details*/
    public function adminShow(Booking $booking)
    {
        $booking->load('user', 'service');
        return view('admin.show', compact('booking'));
    }
    /* staff stats*/
    public function staffIndex()
    {
        $pendingBookings = Booking::with(['user', 'service'])
            ->where('status', 'pending')
            ->get();

        $confirmedBookings = Booking::with(['user', 'service'])
            ->where('status', 'confirmed')
            ->get();

        return view('staff.dashboard', compact('pendingBookings', 'confirmedBookings'));
    }
    /* for staff to accept a booking*/
    public function acceptBooking(Booking $booking)
    {
        if ($booking->status === 'pending') {
            $booking->update(['status' => 'confirmed']);
        }
        return redirect()->route('staff.bookings.index')->with('success', 'Booking accepted.');
    }
    /* for staff to update the status of a booking*/
    public function staffEdit(Booking $booking)
    {
        if ($booking->status !== 'confirmed') {
            abort(403, 'Cannot edit this booking.');
        }
        $booking->load(['user', 'service']);
        return view('staff.bookings.edit', compact('booking'));
    }
    public function staffUpdate(Request $request, Booking $booking)
    {
        $booking->update(['status' => 'completed']);
        return redirect()->route('staff.bookings.index')->with('success', 'Booking marked as completed.');
    }

    public function staffShow(Booking $booking)
    {
        $booking->load('user', 'service');
        return view('staff.show', compact('booking'));
    }
}
