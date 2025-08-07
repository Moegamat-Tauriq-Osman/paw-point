@extends('layouts.app')

@section('content')
<h2>Booking Details</h2>

<div class="card p-4 mb-4">
    <h4>Booking ID: {{ $booking->id }}</h4>
    <p><strong>Service:</strong> {{ $booking->service->name }}</p>
    <p><strong>Price:</strong> ${{ number_format($booking->service->price, 2) }}</p>
    <p><strong>Date & Time:</strong> {{ $booking->date }} {{ $booking->time }}</p>
    <p><strong>Status:</strong>
        <span class="badge bg-{{ $booking->status === 'completed' ? 'success' : ($booking->status === 'confirmed' ? 'primary' : 'warning') }}">
            {{ ucfirst($booking->status) }}
        </span>
    </p><hr>

    <h5>Personal Information</h5>
    <p><strong>Name:</strong> {{ $booking->name }}</p>
    <p><strong>Email:</strong> {{ $booking->email }}</p>
    <p><strong>Phone:</strong> {{ $booking->phone }}</p>

    @if($booking->notes)
    <p><strong>Notes:</strong> {{ $booking->notes }}</p>
    @endif

    <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary mt-3">Back to Bookings</a>
</div>
@endsection