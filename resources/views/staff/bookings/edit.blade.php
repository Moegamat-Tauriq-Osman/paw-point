@extends('layouts.app')

@section('content')
<h2>Update Booking Status</h2>

<div class="card p-3">
    <p><strong>User:</strong> {{ $booking->user->name }}</p>
    <p><strong>Service:</strong> {{ $booking->service->name }}</p>
    <p><strong>Date & Time:</strong> {{ $booking->date }} {{ $booking->time }}</p>

    <form method="POST" action="{{ route('staff.bookings.update', $booking->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="status" value="completed">
        <button type="submit" class="btn btn-success">Mark as Completed</button>
    </form>
</div>
@endsection
