<?php

namespace App\Policies;

use App\Journey;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JourneyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Journey  $journey
     * @return mixed
     */
    public function view(User $user, Journey $journey)
    {
        if($journey->published_at || $user->id == $journey->user_id){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Journey  $journey
     * @return mixed
     */
    public function update(User $user, Journey $journey)
    {
        return $user->id === $journey->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Journey  $journey
     * @return mixed
     */
    public function delete(User $user, Journey $journey)
    {
        return $user->id === $journey->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Journey  $journey
     * @return mixed
     */
    public function restore(User $user, Journey $journey)
    {
        return $user->id === $journey->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Journey  $journey
     * @return mixed
     */
    public function forceDelete(User $user, Journey $journey)
    {
        return $user->id === $journey->user_id;
    }
}
