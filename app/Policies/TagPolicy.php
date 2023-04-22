<?php

namespace App\Policies;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TagPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Tag $tag)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->role == 'admin' 
                ? Response::allow() 
                : Response::deny('You do not have permission to create new users.');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Tag $tag)
    {
        return $user->role === 'admin' 
                ? Response::allow()
                : Response::deny('You do not have permission to perform this action.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Tag $tag)
    {
        return $user->role === 'admin' 
                ? Response::allow()
                : Response::deny('You do not have permission to perform this action.');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Tag $tag)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Tag $tag)
    {
        //
    }
}
