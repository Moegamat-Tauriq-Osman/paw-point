@extends('layouts.app')

@section('content')
@section('title')
Update Staff
@endsection

<form method="POST" action="{{ route('admin.staff.update', $staff->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input name="name" id="name" type="text" class="form-control" value="{{ old('name', $staff->name) }}" required />
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input name="email" id="email" type="email" class="form-control" value="{{ old('email', $staff->email) }}" required />
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password <small>(leave blank to keep current password)</small></label>
        <input name="password" id="password" type="password" class="form-control" />
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input name="password_confirmation" id="password_confirmation" type="password" class="form-control" />
    </div>

    <button class="btn btn-all" type="submit">Update Staff</button>
</form>
@endsection