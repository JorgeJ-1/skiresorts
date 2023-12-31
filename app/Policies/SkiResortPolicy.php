<?php

namespace App\Policies;

use App\Models\SkiResort;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SkiResortPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SkiResort  $skiResort
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, SkiResort $skiResort)
    {
        //
        
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
        return $user->hasRole(['administrador','todopoderoso']);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SkiResort  $skiResort
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, SkiResort $skiResort)
    {
        //
        return $user->id == $skiResort->user_id||$user->hasRole(['administrador','todopoderoso']);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SkiResort  $skiResort
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, SkiResort $skiResort)
    {
        //
        return $user->id == $skiResort->user_id||$user->hasRole(['administrador','todopoderoso']);
    }
    
    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SkiResort  $skiResort
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function destroy(User $user, SkiResort $skiResort)
    {
        //
        return $user->id == $skiResort->user_id||$user->hasRole(['administrador','todopoderoso']);
    }
    
    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SkiResort  $skiResort
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, SkiResort $skiResort)
    {
        //
        return $user->id == $skiResort->user_id||$user->hasRole(['administrador','todopoderoso']);
        
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SkiResort  $skiResort
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, SkiResort $skiResort)
    {
        //
        return $user->hasRole(['administrador','todopoderoso']);
        
    }
}
