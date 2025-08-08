@extends('layouts.app')

@section('content')
@section('title')
My Bookings
@endsection

@if($bookings->isEmpty())
<div class="alert alert-info text-center">You have no bookings yet.</div>
@else
<div class="table-responsive">
    <table class="table table-hover table-bordered align-middle text-center shadow-sm rounded-3">
        <thead style="background-color: #f9fafb;">
            <tr>
                <th scope="col" class="rounded-start">Service Image</th>
                <th scope="col">Service Name</th>
                <th scope="col">Booking ID</th>
                <th scope="col">Date & Time</th>
                <th scope="col">Status</th>
                <th scope="col">View</th>
                <th scope="col" class="rounded-end">Cancel</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
            <tr>
                <td style="width: 80px;">
                    @if($booking->service->image)
                    <img src="{{ asset('storage/' . $booking->service->image) }}" alt="Service Image" class="img-thumbnail rounded" style="max-width: 70px;">
                    @else
                    <span class="text-muted">N/A</span>
                    @endif
                </td>
                <td class="fw-semibold">{{ $booking->service->name }}</td>
                <td>#{{ $booking->id }}</td>
                <td>{{ $booking->date }} <br> <small>{{ $booking->time }}</small></td>
                <td>
                    @php
                    $statusClass = match($booking->status) {
                    'completed' => 'bg-success',
                    'confirmed' => 'bg-warning text-dark',
                    'pending' => 'bg-danger',
                    default => 'bg-secondary',
                    };
                    @endphp
                    <span class="badge {{ $statusClass }}">
                        {{ ucfirst($booking->status) }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('bookings.show', $booking->id) }}" class="btn btn-all btn-sm">
                        <i class="bi bi-eye"></i> View
                    </a>
                </td>
                <td>
                    @if($booking->status !== 'completed')
                    <form method="POST" action="{{ route('bookings.cancel', $booking->id) }}" onsubmit="return confirm('Are you sure you want to cancel this booking?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-all btn-sm">
                            <i class="bi bi-x-circle"></i> Cancel
                        </button>
                    </form>
                    @else
                    <button class="btn btn-all btn-sm" disabled>
                        <i class="bi bi-lock"></i> Cancel
                    </button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
</div>
@endsection