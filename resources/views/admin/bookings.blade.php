@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center fw-bold text-uppercase">All Bookings</h2>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="btn-group mb-4 d-flex justify-content-center" role="group" aria-label="Booking Status Tabs">
        <button type="button" class="btn btn-outline-primary active" data-tab="pending">Bookings</button>
        <button type="button" class="btn btn-outline-primary" data-tab="confirmed">Confirmed</button>
        <button type="button" class="btn btn-outline-primary" data-tab="completed">Completed</button>
    </div>

    <div id="pending" class="booking-tab">
        @if($pendingBookings->isEmpty())
        <p class="text-center">No pending bookings.</p>
        @else
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle text-center shadow-sm rounded-3">
                <thead style="background-color: #f9fafb;">
                    <tr>
                        <th>Service Image</th>
                        <th>Service Name</th>
                        <th>Booking ID</th>
                        <th>Date & Time</th>
                        <th>Status</th>
                        <th>View</th>
                        <th>Accept</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendingBookings as $booking)
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
                            <span class="badge bg-danger">{{ ucfirst($booking->status) }}</span>
                        </td>
                        <td>
                            <a href="{{ route('admin.bookings.show', $booking->id) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i> View
                            </a>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('admin.bookings.accept', $booking->id) }}">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-primary btn-sm">Accept</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>

    <div id="confirmed" class="booking-tab" style="display:none;">
        @if($confirmedBookings->isEmpty())
        <p class="text-center">No confirmed bookings.</p>
        @else
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle text-center shadow-sm rounded-3">
                <thead style="background-color: #f9fafb;">
                    <tr>
                        <th>Service Image</th>
                        <th>Service Name</th>
                        <th>Booking ID</th>
                        <th>Date & Time</th>
                        <th>Status</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($confirmedBookings as $booking)
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
                            <span class="badge bg-warning text-dark">{{ ucfirst($booking->status) }}</span>
                        </td>
                        <td>
                            <a href="{{ route('admin.bookings.show', $booking->id) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i> View
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>

    <div id="completed" class="booking-tab" style="display:none;">
        @if($completedBookings->isEmpty())
        <p class="text-center">No completed bookings.</p>
        @else
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle text-center shadow-sm rounded-3">
                <thead style="background-color: #f9fafb;">
                    <tr>
                        <th>Service Image</th>
                        <th>Service Name</th>
                        <th>Booking ID</th>
                        <th>Date & Time</th>
                        <th>Status</th>
                        <th>View</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($completedBookings as $booking)
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
                            <span class="badge bg-success">{{ ucfirst($booking->status) }}</span>
                        </td>
                        <td>
                            <a href="{{ route('admin.bookings.show', $booking->id) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i> View
                            </a>
                        </td>
                        <td>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const buttons = document.querySelectorAll('.btn-group button');
        const tabs = document.querySelectorAll('.booking-tab');

        buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                buttons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                tabs.forEach(tab => tab.style.display = 'none');

                const selectedTab = btn.getAttribute('data-tab');
                document.getElementById(selectedTab).style.display = 'block';
            });
        });
    });
</script>
@endsection