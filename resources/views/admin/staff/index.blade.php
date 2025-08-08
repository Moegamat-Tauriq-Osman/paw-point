@extends('layouts.app')

@section('content')
@section('title')
Staff Management
@endsection

<a href="{{ route('admin.staff.create') }}" class="btn btn-all mb-3">Add Staff</a>

@if($staff->isEmpty())
<p>No staff members yet.</p>
@else
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($staff as $member)
        <tr>
            <td>{{ $member->name }}</td>
            <td>{{ $member->email }}</td>

            <td>
                <a href="{{ route('admin.staff.edit', $member->id) }}" class="btn btn-all btn-sm">Edit</a>

                <form action="{{ route('admin.staff.destroy', $member->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this staff member?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection