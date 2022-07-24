<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class Userpolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function delete(User $authenticated, User $user){
        if($authenticated->hasRole('Admin') && $authenticated->id!== $user->id){
            return true;
        }
        return false;
    }
}
