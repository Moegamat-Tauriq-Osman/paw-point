@extends('layouts.app')

@section('content')
@section('title')
Admin Dashboard
@endsection
<h3 class="fw-bold">Welcome, {{ Auth::user()->name }}</h3>
<!-- stat for all bookings count -->
<div class="row mt-4">
    <div class="col-md-4">
        <div class="card mb-3 border" style="border-color: #333333;">
            <div class="card-header bg-white">All Bookings</div>
            <div class="card-body text-center">
                <h2 class="fw-bold text-primary">{{ $totalBookings }}</h2>
            </div>
        </div>
    </div>
    <!-- stat for pending bookings count-->
    <div class="col-md-4">
        <div class="card mb-3 border" style="border-color: #333333;">
            <div class="card-header bg-white">Pending Bookings</div>
            <div class="card-body text-center">
                <h2 class="fw-bold text-primary">{{ $pendingBookings }}</h2>
            </div>
        </div>
    </div>
    <!-- stat for confirmed bookings count-->
    <div class="col-md-4">
        <div class="card mb-3 border" style="border-color: #333333;">
            <div class="card-header bg-white">Confirmed Bookings</div>
            <div class="card-body text-center">
                <h2 class="fw-bold text-primary">{{ $confirmedBookings }}</h2>
            </div>
        </div>
    </div>
</div>
<!-- stat for completed bookings count -->
<!-- stat for completed bookings count -->
<div class="row mt-3">
    <div class="col-md-4">
        <div class="card mb-3 border" style="border-color: #333333;">
            <div class="card-header bg-white">Completed Bookings</div>
            <div class="card-body text-center">
                <h2 class="fw-bold text-primary">{{ $completedBookings }}</h2>
            </div>
        </div>
    </div>
</div>

<!-- stat for all services count -->
<div class="row mt-3">
    <div class="col-md-4">
        <div class="card mb-3 border" style="border-color: #333333;">
            <div class="card-header bg-white">Total Services</div>
            <div class="card-body text-center">
                <h2 class="fw-bold text-primary">{{ $totalServices }}</h2>
            </div>
        </div>
    </div>
    <!-- stat for all staff count -->
    <div class="col-md-4">
        <div class="card mb-3 border" style="border-color: #333333;">
            <div class="card-header bg-white">Staff Members</div>
            <div class="card-body text-center">
                <h2 class="fw-bold text-primary">{{ $totalStaff }}</h2>
            </div>
        </div>
    </div>
    <!-- stat for clients count -->
    <div class="col-md-4">
        <div class="card mb-3 border" style="border-color: #333333;">
            <div class="card-header bg-white">Clients</div>
            <div class="card-body text-center">
                <h2 class="fw-bold text-primary">{{ $totalUsers }}</h2>
            </div>
        </div>
    </div>
</div>
</div>
@endsection