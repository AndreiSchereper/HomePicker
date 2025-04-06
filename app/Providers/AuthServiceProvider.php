<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\DatabaseNotification;
use App\Policies\NotificationPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        DatabaseNotification::class => NotificationPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}