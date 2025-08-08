<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        /* display the admin stats*/
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $confirmedBookings = Booking::where('status', 'confirmed')->count();
        $completedBookings = Booking::where('status', 'completed')->count();

        $totalServices = Service::count();
        $totalStaff = User::where('role', 'Staff')->count();
        $totalUsers = User::where('role', 'User')->count();

        return view('admin.dashboard', compact(
            'totalBookings',
            'pendingBookings',
            'confirmedBookings',
            'completedBookings',
            'totalServices',
            'totalStaff',
            'totalUsers'
        ));
    }
}
