@extends('layouts.app')

@section('content')
<h2>Edit Service</h2>

<form method="POST" action="{{ route('admin.services.update', $service->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Service Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $service->name) }}" required />
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $service->description) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price (ZAR)</label>
        <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ old('price', $service->price) }}" required />
    </div>

    <div class="mb-3">
        <label for="duration" class="form-label">Duration (minutes)</label>
        <input type="number" name="duration" id="duration" class="form-control" min="0" value="{{ old('duration', $service->duration) }}" />
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Service Image</label>
        <input type="file" name="image" id="image" class="form-control" accept="image/*" />
        @if($service->image)
        <div class="mt-2">
            <img src="{{ asset('storage/' . $service->image) }}" alt="Service Image" width="100" />
        </div>
        @endif
    </div>

    <button type="submit" class="btn btn-success">Update Service</button>
</form>
@endsection