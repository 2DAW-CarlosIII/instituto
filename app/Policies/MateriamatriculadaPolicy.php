<?php

namespace App\Policies;

use App\Models\Materiamatriculada;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MateriamatriculadaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true; // Todos los usuarios van a poder ver el listado de materias matriculadas
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Materiamatriculada  $materiamatriculada
     * @return mixed
     */
    public function view(User $user, Materiamatriculada $materiamatriculada)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Materiamatriculada  $materiamatriculada
     * @return mixed
     */
    public function update(User $user, Materiamatriculada $materiamatriculada)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Materiamatriculada  $materiamatriculada
     * @return mixed
     */
    public function delete(User $user, Materiamatriculada $materiamatriculada)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Materiamatriculada  $materiamatriculada
     * @return mixed
     */
    public function restore(User $user, Materiamatriculada $materiamatriculada)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Materiamatriculada  $materiamatriculada
     * @return mixed
     */
    public function forceDelete(User $user, Materiamatriculada $materiamatriculada)
    {
        //
    }
}
