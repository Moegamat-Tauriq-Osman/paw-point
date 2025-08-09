@extends('layouts.app')

@section('content')
@section('title')
Complete booking
@endsection

<div class="card p-3">
    <h4>Booking ID: {{ $booking->id }}</h4>
    <p><strong>Service:</strong> {{ $booking->service->name }}</p>
    <p><strong>Price:</strong> R{{ number_format($booking->service->price, 2) }}</p>
    <p><strong>Date & Time:</strong> {{ $booking->date }} {{ $booking->time }}</p>
    <p><strong>Name:</strong> {{ $booking->name }}</p>
    <p><strong>Email:</strong> {{ $booking->email }}</p>
    <p><strong>Phone:</strong> {{ $booking->phone }}</p>

    <form method="POST" action="{{ route('staff.bookings.update', $booking->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="status" value="completed">
        <button type="submit" class="btn btn-all">Mark as Completed</button>
    </form>
</div>
@endsection
