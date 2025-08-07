@extends('layouts.app')

@section('content')
<h2>Create Staff Member</h2>

<form method="POST" action="{{ route('admin.staff.store') }}">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input name="name" id="name" type="text" class="form-control" required />
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input name="email" id="email" type="email" class="form-control" required />
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input name="password" id="password" type="password" class="form-control" required />
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input name="password_confirmation" id="password_confirmation" type="password" class="form-control" required />
    </div>

    <button class="btn btn-primary" type="submit">Create Staff</button>
</form>
@endsection