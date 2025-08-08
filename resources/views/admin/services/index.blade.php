@extends('layouts.app')

@section('content')
@section('title')
Service Management
@endsection

<a href="{{ route('admin.services.create') }}" class="btn btn-all mb-3">Add New Service</a>

@if($services->isEmpty())
<p class="text-center">No services available.</p>
@else
<div class="table-responsive">
    <table class="table table-hover table-bordered align-middle text-center shadow-sm rounded-3">
        <thead style="background-color: #ffffff;">
            <tr>
                <th>Image</th>
                <th>Service Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Duration</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <!-- service image -->
                <td style="width: 80px;">
                    @if($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}" alt="Service Image" class="img-thumbnail rounded" style="max-width: 70px;">
                    @else
                    <span class="text-muted">N/A</span>
                    @endif
                </td>
                <!-- service name -->
                <td>{{ $service->name }}</td>
                <td>{{ $service->description }}</td>
                <td>R{{ number_format($service->price, 2) }}</td>
                <td>{{ $service->duration ?? 'N/A' }} min</td>
                <td>
                    <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-all btn-sm">Edit</a>
                    <form method="POST" action="{{ route('admin.services.destroy', $service->id) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this service?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
</div>
@endsection