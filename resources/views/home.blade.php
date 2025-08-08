@extends('layouts.app')

@section('content')
@section('title')
Home
@endsection
<h3>Welcome, {{ Auth::user()->name }}</h3>
<!-- all booking stat count -->
<div class="row mt-4">
    <div class="col-md-4">
        <div class="card mb-3 border" style="border-color: #333333;">
            <div class="card-header bg-white">Total Bookings</div>
            <div class="card-body text-center">
                <h2 class="fw-bold" style="color: #2F98E8;">{{ $totalBookings }}</h2>
            </div>
        </div>
    </div>
    <!-- pending booking sta count -->
    <div class="col-md-4">
        <div class="card mb-3 border" style="border-color: #333333;">
            <div class="card-header bg-white">Pending Bookings</div>
            <div class="card-body text-center">
                <h2 class="fw-bold" style="color: #2F98E8;">{{ $pendingBookings }}</h2>
            </div>
        </div>
    </div>
    <!-- completed booking stat count -->
    <div class="col-md-4">
        <div class="card mb-3 border" style="border-color: #333333;">
            <div class="card-header bg-white">Completed Bookings</div>
            <div class="card-body text-center">
                <h2 class="fw-bold" style="color: #2F98E8;">{{ $completedBookings }}</h2>
            </div>
        </div>
    </div>
</div>
</div>
@endsection