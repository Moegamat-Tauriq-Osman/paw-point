@extends('layouts.app')

@section('content')
@section('title')
Booking details
@endsection

<div class="card p-4 mb-4">
    <h4>Booking ID: {{ $booking->id }}</h4>
    <p><strong>Status:</strong>
        <span class="badge 
            @if($booking->status === 'completed') bg-success
            @elseif($booking->status === 'confirmed') bg-warning text-dark
            @else bg-danger
            @endif">
            {{ ucfirst($booking->status) }}
        </span>
    </p>
    <p><img src="{{ asset('storage/' . $booking->service->image) }}" alt="Service Image" class="img-thumbnail rounded" style="max-width: 70px;"> {{ $booking->service->name }}</p>
    <p><strong>Price:</strong> R{{ number_format($booking->service->price, 2) }}</p>
    <p><strong>Date & Time:</strong> {{ $booking->date }} {{ $booking->time }}</p>

    <hr>

    <h5>Personal Information</h5>
    <p><strong>Name:</strong> {{ $booking->name }}</p>
    <p><strong>Email:</strong> {{ $booking->email }}</p>
    <p><strong>Phone:</strong> {{ $booking->phone }}</p>
    @if($booking->notes)
    <p><strong>Notes:</strong> {{ $booking->notes }}</p>
    @endif

    <a href="{{ route('bookings.index') }}" class="btn btn-all mt-3">Back to My Bookings</a>
</div>
@endsection