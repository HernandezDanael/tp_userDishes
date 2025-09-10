<?php

namespace App\Providers;

use App\Listeners\AssigneDefaultRoleToUser;
use App\Models\User;
class EventServiceProvider extends \Illuminate\Events\EventServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        User::created([
            AssigneDefaultRoleToUser::class, 'handle',
        ]);
    }
}
