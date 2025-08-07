@extends('layouts.app')

@section('content')
<h2>Staff Dashboard</h2>

<h4>Pending Bookings</h4>
@if($pendingBookings->isEmpty())
    <p>No pending bookings.</p>
@else
    <ul class="list-group mb-4">
        @foreach($pendingBookings as $booking)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    {{ $booking->user->name }} — {{ $booking->service->name }} — {{ $booking->date }} {{ $booking->time }}
                </div>
                <form method="POST" action="{{ route('staff.bookings.accept', $booking->id) }}">
                    @csrf
                    <button class="btn btn-primary btn-sm">Accept</button>
                </form>
            </li>
        @endforeach
    </ul>
@endif

<h4>Confirmed Bookings</h4>
@if($confirmedBookings->isEmpty())
    <p>No confirmed bookings.</p>
@else
    <ul class="list-group">
        @foreach($confirmedBookings as $booking)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    {{ $booking->user->name }} — {{ $booking->service->name }} — {{ $booking->date }} {{ $booking->time }}
                </div>
                <a href="{{ route('staff.bookings.edit', $booking->id) }}" class="btn btn-success btn-sm">Mark as Completed</a>
            </li>
        @endforeach
    </ul>
@endif
@endsection
