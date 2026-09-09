<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{

    public function porCurso($curso)
    {
        $alunos = Aluno::where('curso', $curso)->get();
        return response()->json($alunos);
    }
    public function porNome($palavra)
    {
        $alunos = Aluno::where('nome', 'LIKE', "%{$palavra}%")->get();
        return response()->json($alunos);
    }

    public function recentes()
    {
        $alunos = Aluno::where('created_at', '>=', now()->subDays(7))->get();
        return response()->json($alunos);
    }
    public function quantidade()
    {
        $total = Aluno::count();
        return response()->json(['total_alunos' => $total]);
    }
}