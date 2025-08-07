@extends('layouts.app')

@section('content')
<h2>Create Service</h2>

<form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Service Name</label>
        <input type="text" name="name" id="name" class="form-control" required />
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control" rows="3"></textarea>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price (ZAR)</label>
        <input type="number" name="price" id="price" class="form-control" step="0.01" required />
    </div>

    <div class="mb-3">
        <label for="duration" class="form-label">Duration (minutes)</label>
        <input type="number" name="duration" id="duration" class="form-control" min="0" />
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Upload Image</label>
        <input type="file" name="image" id="image" class="form-control" accept="image/*" />
    </div>

    <button type="submit" class="btn btn-primary">Create Service</button>
</form>
@endsection