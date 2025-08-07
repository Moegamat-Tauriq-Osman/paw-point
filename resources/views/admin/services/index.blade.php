@extends('layouts.app')

@section('content')
<h2>Manage Services</h2>
<a href="{{ route('admin.services.create') }}" class="btn btn-success mb-3">Add New Service</a>

@if($services->isEmpty())
<p>No services available.</p>
@else
<ul class="list-group">
    @foreach($services as $service)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <div>
            <strong>{{ $service->name }}</strong> — R{{ number_format($service->price, 2) }}<br>
            <small>{{ $service->description }}</small><br>
            Duration: {{ $service->duration ?? 'N/A' }} minutes<br>
            @if($service->image)
            <img src="{{ asset('storage/' . $service->image) }}" alt="Service Image" width="80" class="mt-2">
            @endif
        </div>
        <div>
            <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
            <form method="POST" action="{{ route('admin.services.destroy', $service->id) }}" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this service?')">Delete</button>
            </form>
        </div>
    </li>
    @endforeach
</ul>
@endif
@endsection