<?php

namespace App\Policies;

use App\Step;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use function MongoDB\BSON\toRelaxedExtendedJSON;

class StepPolicy
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
     * @param  \App\Step  $step
     * @return mixed
     */
    public function view(User $user, Step $step)
    {
         if($step->journey()->is_public || $user->id == $step->user_id){
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
     * @param  \App\Step  $step
     * @return mixed
     */
    public function update(User $user, Step $step)
    {
        return $user->id === $step->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Step  $step
     * @return mixed
     */
    public function delete(User $user, Step $step)
    {
        return $user->id === $step->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Step  $step
     * @return mixed
     */
    public function restore(User $user, Step $step)
    {
        return $user->id === $step->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Step  $step
     * @return mixed
     */
    public function forceDelete(User $user, Step $step)
    {
        return $user->id === $step->user_id;
    }
}
