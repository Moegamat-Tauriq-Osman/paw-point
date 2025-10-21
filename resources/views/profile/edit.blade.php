@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="container pt-3 pb-5">
    <div class="profile-container mx-auto" style="max-width: 800px;">

        {{-- Success Messages --}}
        @if (session('status') === 'profile-updated')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Profile information updated successfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session('status') === 'password-updated')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Password updated successfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        {{-- Update Profile Information --}}
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-primary text-white fw-semibold">
                Update Profile Information
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3 row">
                        <label for="name" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $user->name) }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', $user->email) }}" required>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-app-blue">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Update Password --}}
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-primary text-white fw-semibold">
                Change Password
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3 row">
                        <label for="current_password" class="col-sm-3 col-form-label">Current Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="current_password" id="current_password"
                                class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" required>
                            @error('current_password', 'updatePassword')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="password" class="col-sm-3 col-form-label">New Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" id="password"
                                class="form-control @error('password', 'updatePassword') is-invalid @enderror" required>
                            @error('password', 'updatePassword')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="password_confirmation" class="col-sm-3 col-form-label">Confirm Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror" required>
                            @error('password_confirmation', 'updatePassword')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-app-blue">Change Password</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Delete Account --}}
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-danger text-white fw-semibold">
                Delete Account
            </div>
            <div class="card-body text-center">
                <form method="POST" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('DELETE')

                    <p class="text-danger mb-3">
                        Once you delete your account, all of your data will be permanently removed.
                    </p>

                    <div class="mb-3 row">
                        <label for="delete_password" class="col-sm-3 col-form-label">Confirm Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" id="delete_password"
                                class="form-control @error('password', 'userDeletion') is-invalid @enderror"
                                placeholder="Enter your password" required>
                            @error('password', 'userDeletion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-app-blue btn-danger">
                        Delete Account
                    </button>
                </form>
            </div>
        </div>


    </div>
</div>

<style>
    .btn-app-blue {
        background-color: #2F98E8;
        border-color: #2F98E8;
        color: #fff;
    }

    .btn-app-blue:hover,
    .btn-app-blue:focus {
        background-color: #2F51E8;
        border-color: #2F51E8;
        color: #fff;
    }

    .form-control:focus {
        border-color: #2F98E8;
        box-shadow: 0 0 0 0.2rem rgba(47, 152, 232, 0.25);
    }
</style>
@endsection