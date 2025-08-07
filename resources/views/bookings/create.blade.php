@extends('layouts.app')

@section('content')
<h2>Book {{ ucfirst(request()->query('type')) }}</h2>

<form method="POST" action="{{ route('bookings.store') }}" id="bookingForm">
    @csrf
    <input type="hidden" name="type" value="{{ request()->query('type') }}">

    <div id="step1">
        <h4>Select a Service</h4>
        <div class="row">
            @foreach($services as $service)
            <div class="col-md-4 mb-3">
                <div class="card service-card" style="cursor:pointer;" data-service-id="{{ $service->id }}">
                    @if($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}" class="card-img-top" alt="{{ $service->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $service->name }}</h5>
                        <p class="card-text">Price: R{{ number_format($service->price, 2) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div id="step2" style="display:none;">
        <input type="hidden" name="service_id" id="selectedServiceId" required>

        <div class="mb-3">
            <label for="date" class="form-label">Select Date</label>
            <input type="date" id="date" name="date" class="form-control" min="{{ date('Y-m-d') }}" required>
        </div>

        <div class="mb-3">
            <label for="time" class="form-label">Select Time</label>
            <select id="time" name="time" class="form-select" required>
            </select>
        </div>

        <button type="button" class="btn btn-secondary" id="backToStep1">Back</button>
        <button type="button" class="btn btn-primary" id="toStep3" disabled>Next</button>
    </div>

    <div id="step3" style="display:none;">
        <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" id="name" name="name" class="form-control" required />
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" required />
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="tel" id="phone" name="phone" class="form-control" required />
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">Notes (Optional)</label>
            <textarea id="notes" name="notes" class="form-control"></textarea>
        </div>

        <button type="button" class="btn btn-secondary" id="backToStep2">Back</button>
        <button type="submit" class="btn btn-success">Submit Booking</button>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const serviceCards = document.querySelectorAll('.service-card');
        const step1 = document.getElementById('step1');
        const step2 = document.getElementById('step2');
        const step3 = document.getElementById('step3');

        const selectedServiceIdInput = document.getElementById('selectedServiceId');
        const dateInput = document.getElementById('date');
        const timeSelect = document.getElementById('time');

        const backToStep1Btn = document.getElementById('backToStep1');
        const toStep3Btn = document.getElementById('toStep3');
        const backToStep2Btn = document.getElementById('backToStep2');

        serviceCards.forEach(card => {
            card.addEventListener('click', () => {
                selectedServiceIdInput.value = card.dataset.serviceId;

                serviceCards.forEach(c => c.classList.remove('border-primary', 'border-3'));
                card.classList.add('border-primary', 'border-3');

                step1.style.display = 'none';
                step2.style.display = 'block';
            });
        });

        backToStep1Btn.addEventListener('click', () => {
            step2.style.display = 'none';
            step1.style.display = 'block';
            toStep3Btn.disabled = true;
            dateInput.value = '';
            timeSelect.innerHTML = '';
        });

        backToStep2Btn.addEventListener('click', () => {
            step3.style.display = 'none';
            step2.style.display = 'block';
        });

        function populateTimeSlots() {
            timeSelect.innerHTML = '';
            const startHour = 9;
            const endHour = 17;

            for (let hour = startHour; hour < endHour; hour++) {
                const hourStr = hour.toString().padStart(2, '0');
                ['00', '30'].forEach(minute => {
                    const time = `${hourStr}:${minute}`;
                    const option = document.createElement('option');
                    option.value = time;
                    option.textContent = time;
                    timeSelect.appendChild(option);
                });
            }

            const finalOption = document.createElement('option');
            finalOption.value = '17:00';
            finalOption.textContent = '17:00';
            timeSelect.appendChild(finalOption);
        }

        dateInput.addEventListener('change', () => {
            if (!dateInput.value) return;
            populateTimeSlots();
            toStep3Btn.disabled = false;
        });

        timeSelect.addEventListener('change', () => {
            toStep3Btn.disabled = !timeSelect.value;
        });

        toStep3Btn.addEventListener('click', () => {
            step2.style.display = 'none';
            step3.style.display = 'block';
        });
    });
</script>

@endsection