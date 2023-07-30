<?php

namespace App\Policies;

use App\Models\Profil;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ProfilPolicy
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
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Profil $profil)
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
        return $user->profil_id == 1;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Profil  $profil
     */
    public function update(User $user, Profil $profil): Response
    {
        return $user->profil_id == $profil->id ? Response::allow() : Response::deny('Vous ne pouvez pas modiifé car vous n(etes pas admin');

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Profil $profil)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Profil $profil)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Profil $profil)
    {
        //
    }
}
