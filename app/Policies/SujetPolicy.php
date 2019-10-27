<?php

namespace App\Policies;

use App\User;
use App\Sujet;
use Illuminate\Auth\Access\HandlesAuthorization;

class SujetPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can do something on a sujet.
     *
     * @param  \App\User  $user
     * @param  \App\Sujet  $sujet
     * @return boolean
     */
    public function before(User $user, $sujet)
    {
        if ($user->isAdmin()) {
          return true;
        }
    }

    /**
     * Determine whether the user can view the sujet.
     *
     * @param  \App\User  $user
     * @param  \App\Sujet  $sujet
     * @return mixed
     */
    public function view(User $user, Sujet $sujet)
    {
        //
    }

    /**
     * Determine whether the user can create sujets.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the sujet.
     *
     * @param  \App\User  $user
     * @param  \App\Sujet  $sujet
     * @return mixed
     */
    public function update(User $user, Sujet $sujet)
    {
        //
    }

    /**
     * Determine whether the user can delete the sujet.
     *
     * @param  \App\User  $user
     * @param  \App\Sujet  $sujet
     * @return mixed
     */
    public function delete(User $user, Sujet $sujet)
    {
        //
    }
}
