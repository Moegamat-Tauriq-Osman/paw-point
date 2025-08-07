@extends('layouts.app')

@section('content')
<h2>Staff Members</h2>

<a href="{{ route('admin.staff.create') }}" class="btn btn-success mb-3">Add Staff</a>

@if($staff->isEmpty())
<p>No staff members yet.</p>
@else
<ul class="list-group">
    @foreach($staff as $member)
    <li class="list-group-item">
        <strong>{{ $member->name }}</strong> — {{ $member->email }}<br>
        Role: {{ ucfirst($member->role ?? 'Staff') }}
        @if($member->services && $member->services->count())
        <br>Services:
        <ul>
            @foreach($member->services as $service)
            <li>{{ $service->name }}</li>
            @endforeach
        </ul>
        @endif
    </li>
    @endforeach
</ul>
@endif
@endsection