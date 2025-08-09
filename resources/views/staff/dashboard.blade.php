@extends('layouts.app')

@section('content')
@section('title')
Staff Bookings
@endsection

<div class="btn-group mb-4 d-flex justify-content-center" role="group" aria-label="Booking Status Tabs">
    <button type="button" class="btn btn-outline-primary active" data-tab="pending">Pending</button>
    <button type="button" class="btn btn-outline-primary" data-tab="confirmed">Confirmed</button>
</div>

<!-- pending bookings -->
<div id="pending" class="booking-tab">
    @if($pendingBookings->isEmpty())
    <p class="text-center">No pending bookings.</p>
    @else
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle text-center shadow-sm rounded-3">
            <thead style="background-color: #ffffff;">
                <tr>
                    <th>Customer</th>
                    <th>Service Image</th>
                    <th>Service</th>
                    <th>Booking ID</th>
                    <th>Date & Time</th>
                    <th>Status</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pendingBookings as $booking)
                <tr>
                    <td>{{ $booking->user->name }}</td>
                    <td style="width: 80px;">
                        @if($booking->service->image)
                        <img src="{{ asset('storage/' . $booking->service->image) }}" alt="Service Image" class="img-thumbnail rounded" style="max-width: 70px;">
                        @else
                        <span class="text-muted">N/A</span>
                        @endif
                    <td>{{ $booking->service->name }}</td>
                    <td>#{{ $booking->id }}</td>
                    <td>{{ $booking->date }} <br> <small>{{ $booking->time }}</small></td>
                    <td>
                        <span class="badge bg-danger">{{ ucfirst($booking->status) }}</span>
                    </td>
                    <td>
                        <a href="{{ route('staff.bookings.show', $booking->id) }}" class="btn btn-all btn-sm">
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

<!-- confirmed bookings -->
<div id="confirmed" class="booking-tab" style="display:none;">
    @if($confirmedBookings->isEmpty())
    <p class="text-center">No confirmed bookings.</p>
    @else
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle text-center shadow-sm rounded-3">
            <thead style="background-color: #ffffff;">
                <tr>
                    <th>Customer</th>
                    <th>Service Image</th>
                    <th>Service</th>
                    <th>Booking ID</th>
                    <th>Date & Time</th>
                    <th>Status</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                @foreach($confirmedBookings as $booking)
                <tr>
                    <td>{{ $booking->user->name }}</td>
                    <td style="width: 80px;">
                        @if($booking->service->image)
                        <img src="{{ asset('storage/' . $booking->service->image) }}" alt="Service Image" class="img-thumbnail rounded" style="max-width: 70px;">
                        @else
                        <span class="text-muted">N/A</span>
                        @endif
                    <td>{{ $booking->service->name }}</td>
                    <td>#{{ $booking->id }}</td>
                    <td>{{ $booking->date }} <br> <small>{{ $booking->time }}</small></td>
                    <td>
                        <span class="badge bg-warning text-dark">{{ ucfirst($booking->status) }}</span>
                    </td>
                    <td>
                        <a href="{{ route('staff.bookings.show', $booking->id) }}" class="btn btn-all btn-sm">
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

<script>
    document.querySelectorAll('[data-tab]').forEach(button => {
        button.addEventListener('click', () => {
            document.querySelectorAll('.booking-tab').forEach(tab => tab.style.display = 'none');
            document.querySelectorAll('[data-tab]').forEach(btn => btn.classList.remove('active'));

            document.getElementById(button.dataset.tab).style.display = 'block';
            button.classList.add('active');
        });
    });
</script>
@endsection