@extends('layouts.app')

@section('title', 'Staff Bookings')

@section('content')
<div class="d-flex justify-content-center mb-3">
    <input type="text" id="search" class="form-control w-50" placeholder="Search by Booking ID or Client Name...">
</div>

<div class="btn-group mb-4 d-flex justify-content-center" role="group">
    <button type="button" class="btn btn-outline-primary active" data-tab="pending">Pending</button>
    <button type="button" class="btn btn-outline-primary" data-tab="confirmed">Confirmed</button>
</div>

<div id="pending" class="booking-tab">
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle text-center shadow-sm rounded-3">
            <thead>
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
                @forelse($pendingBookings as $booking)
                <tr>
                    <td>{{ $booking->user->name }}</td>
                    <td style="width:80px;">
                        @if($booking->service->image)
                        <img src="{{ asset('storage/' . $booking->service->image) }}" class="img-thumbnail rounded" style="max-width:70px;">
                        @else
                        <span class="text-muted">N/A</span>
                        @endif
                    </td>
                    <td>{{ $booking->service->name }}</td>
                    <td>#{{ $booking->id }}</td>
                    <td>{{ $booking->date }} <br><small>{{ $booking->time }}</small></td>
                    <td><span class="badge bg-danger">{{ ucfirst($booking->status) }}</span></td>
                    <td><a href="{{ route('staff.bookings.show', $booking->id) }}" class="btn btn-all btn-sm"><i class="bi bi-eye"></i> View</a></td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-muted">No pending bookings.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div id="confirmed" class="booking-tab" style="display:none;">
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle text-center shadow-sm rounded-3">
            <thead>
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
                @forelse($confirmedBookings as $booking)
                <tr>
                    <td>{{ $booking->user->name }}</td>
                    <td style="width:80px;">
                        @if($booking->service->image)
                        <img src="{{ asset('storage/' . $booking->service->image) }}" class="img-thumbnail rounded" style="max-width:70px;">
                        @else
                        <span class="text-muted">N/A</span>
                        @endif
                    </td>
                    <td>{{ $booking->service->name }}</td>
                    <td>#{{ $booking->id }}</td>
                    <td>{{ $booking->date }} <br><small>{{ $booking->time }}</small></td>
                    <td><span class="badge bg-warning text-dark">{{ ucfirst($booking->status) }}</span></td>
                    <td><a href="{{ route('staff.bookings.show', $booking->id) }}" class="btn btn-all btn-sm"><i class="bi bi-eye"></i> View</a></td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-muted">No confirmed bookings.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('[data-tab]').forEach(button => {
            button.addEventListener('click', () => {
                document.querySelectorAll('.booking-tab').forEach(tab => tab.style.display = 'none');
                document.querySelectorAll('[data-tab]').forEach(btn => btn.classList.remove('active'));
                document.getElementById(button.dataset.tab).style.display = 'block';
                button.classList.add('active');
            });
        });

        document.getElementById('search').addEventListener('keyup', function() {
            const query = encodeURIComponent(this.value);

            fetch(`/staff/bookings/search?q=${query}`)
                .then(res => res.json())
                .then(data => {
                    updateTable('pending', data.pending);
                    updateTable('confirmed', data.confirmed);
                })
                .catch(err => console.error(err));
        });

        function updateTable(tabId, bookings) {
            const tbody = document.querySelector(`#${tabId} tbody`);
            if (!tbody) return;
            tbody.innerHTML = '';

            if (!bookings || bookings.length === 0) {
                tbody.innerHTML = `<tr><td colspan="7" class="text-center">No bookings found.</td></tr>`;
                return;
            }

            bookings.forEach(b => {
                const badgeClass = b.status === 'pending' ? 'bg-danger' : 'bg-warning text-dark';
                tbody.innerHTML += `
            <tr>
                <td>${b.user.name}</td>
                <td style="width:80px;">
                    ${b.service.image ? `<img src="/storage/${b.service.image}" class="img-thumbnail rounded" style="max-width:70px;">` : '<span class="text-muted">N/A</span>'}
                </td>
                <td>${b.service.name}</td>
                <td>#${b.id}</td>
                <td>${b.date} <br><small>${b.time}</small></td>
                <td><span class="badge ${badgeClass}">${b.status.charAt(0).toUpperCase() + b.status.slice(1)}</span></td>
                <td><a href="/staff/bookings/${b.id}" class="btn btn-all btn-sm"><i class="bi bi-eye"></i> View</a></td>
            </tr>`;
            });
        }
    });
</script>
@endsection