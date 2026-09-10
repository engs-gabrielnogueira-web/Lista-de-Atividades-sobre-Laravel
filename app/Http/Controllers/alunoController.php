<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Curso;

class alunoController extends Controller
{
    public function relatorio()
    {
                $cursos = Curso::with('alunos')->get();

        return view('alunos.relatorio', compact('cursos'));
    }
}