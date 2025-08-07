<?php

namespace App\Policies;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookingPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Booking $booking)
    {
        return $user->id === $booking->user_id || $user->role === 'Admin';
    }

    public function update(User $user, Booking $booking)
    {
        return $user->id === $booking->user_id || $user->role === 'Admin';
    }

    public function delete(User $user, Booking $booking)
    {
        return $user->id === $booking->user_id || $user->role === 'User';
    }

    public function updateStatus(User $user, Booking $booking)
    {
        return $user->role === 'Admin' || $user->role === 'Staff';
    }
}
