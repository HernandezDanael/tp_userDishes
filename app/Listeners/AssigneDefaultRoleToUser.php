<?php

namespace App\Listeners;

use App\Models\User;
use Spatie\Permission\Models\Role;
class AssigneDefaultRoleToUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(User $user)
    {
        $user->assignRole(Role::find(1));

    }
}
