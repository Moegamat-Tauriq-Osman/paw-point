<?php

namespace App\Providers;

use App\Models\Booking;
use App\Models\Service;
use App\Policies\BookingPolicy;
use App\Policies\ServicePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Booking::class => BookingPolicy::class,
        Service::class => ServicePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

    Gate::define('is-admin', function ($user) {
        return $user->role === 'Admin';
    });

    Gate::define('is-staff', function ($user) {
        return $user->role === 'Staff';
    });

    Gate::define('is-user', function ($user) {
        return $user->role === 'User';
    });

    Gate::define('manage-services', function ($user) {
        return $user->role === 'Admin';
    });

    Gate::define('view-bookings', function ($user) {
        return in_array($user->role, ['Admin', 'Staff']);
    });

    Gate::define('update-booking-status', function ($user) {
        return $user->role === 'Staff';
    });
}
    }