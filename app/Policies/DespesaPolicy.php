<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Despesa;
use Illuminate\Auth\Access\HandlesAuthorization;

class DespesaPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Despesa $despesa)
    {
        return $user->id === $despesa->id_usuario;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Despesa $despesa)
    {
        return $user->id === $despesa->id_usuario;
    }

    public function delete(User $user, Despesa $despesa)
    {
        return $user->id === $despesa->id_usuario;
    }
}
