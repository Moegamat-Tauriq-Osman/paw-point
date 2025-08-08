<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index()
    {
        $staff = User::where('role', 'Staff')->get();
        return view('admin.staff.index', compact('staff'));
    }

    public function create()
    {
        return view('admin.staff.create');
    }

    public function edit(User $staff)
    {
        return view('admin.staff.edit', compact('staff'));
    }

    public function update(Request $request, User $staff)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $staff->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $staff->name = $request->name;
        $staff->email = $request->email;

        if ($request->filled('password')) {
            $staff->password = Hash::make($request->password);
        }

        $staff->save();

        return redirect()->route('admin.staff.index')->with('success', 'Staff updated successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'Staff',
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.staff.index')->with('success', 'Staff created successfully.');
    }

    public function destroy(User $staff)
    {
        $staff->delete();
        return redirect()->route('admin.staff.index')->with('success', 'Staff deleted successfully.');
    }

    /* for staff dashboard*/
    public function dashboard()
    {
        $pendingBookings = Booking::with(['user', 'service'])
            ->where('status', 'pending')
            ->get();

        $confirmedBookings = Booking::with(['user', 'service'])
            ->where('status', 'confirmed')
            ->get();

        return view('staff.dashboard', compact('pendingBookings', 'confirmedBookings'));
    }
}
