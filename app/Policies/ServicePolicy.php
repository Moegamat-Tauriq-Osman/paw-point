<?php

namespace App\Policies;

use App\Models\Service;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ServicePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return in_array($user->role, ['Admin', 'Staff Member']);
    }

    public function create(User $user)
    {
        return $user->role === 'Admin';
    }

    public function update(User $user, Service $service)
    {
        return $user->role === 'Admin';
    }

    public function delete(User $user, Service $service)
    {
        return $user->role === 'Admin';
    }
}
