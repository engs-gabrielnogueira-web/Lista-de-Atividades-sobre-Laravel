<?php

namespace Database\Seeders;

use App\Models\Aluno;
use Illuminate\Database\Seeder;

class AlunoSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Aluno::create([
                'nome'  => "Aluno Exemplo {$i}",
                'email' => "aluno{$i}@email.com",
                'cpf'   => sprintf('%03d.%03d.%03d-%02d', $i, $i, $i, $i),
            ]);
        }
    }
}