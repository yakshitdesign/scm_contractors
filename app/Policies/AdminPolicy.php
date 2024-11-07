<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    public function manageAdmins(User $user)
    {
        return $user->role === 'super_admin';
    }
}
