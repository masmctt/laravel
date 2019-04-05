<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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
    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }
    public function edit(User $authUser, User $postUser)
    {
        return $authUser->id === $postUser->id;
    }

    public function update(User $authUser, User $postUser)
    {
        return $authUser->id === $postUser->id;
    }

    public function destroy(User $authUser, User $postUser)
    {
        return $authUser->id === $postUser->id;
    }
}
