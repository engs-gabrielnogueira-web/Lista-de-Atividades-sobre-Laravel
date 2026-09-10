<?php

namespace App\Policies;

use App\Models\Aluno;
use App\Models\User;

class AlunoPolicy
{

    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }
    public function update(User $user, Aluno $aluno): bool
    {
        return in_array($user->role, ['admin', 'professor']);
    }

    public function delete(User $user, Aluno $aluno): bool
    {
        return $user->role === 'admin';
    }
}