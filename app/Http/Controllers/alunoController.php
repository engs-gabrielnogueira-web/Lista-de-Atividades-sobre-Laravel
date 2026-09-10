<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::all();
        return view('alunos.index', compact('alunos'));
    }
    public function create()
    {
        return view('alunos.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:alunos,email',
            'cpf' => 'required|string|unique:alunos,cpf',
        ]);

        Aluno::create($validatedData);

        return redirect()->route('alunos.index')->with('success', 'Aluno criado com sucesso!');
    }
    public function show(Aluno $aluno)
    {
        return view('alunos.show', compact('aluno'));
    }
    public function edit(Aluno $aluno)
    {
        return view('alunos.edit', compact('aluno'));
    }

    public function update(Request $request, Aluno $aluno)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:alunos,email,' . $aluno->id,
            'cpf' => 'required|string|unique:alunos,cpf,' . $aluno->id,
        ]);

        $aluno->update($validatedData);

        return redirect()->route('alunos.index')->with('success', 'Aluno atualizado com sucesso!');
    }

    public function destroy(Aluno $aluno)
    {
        $aluno->delete();

        return redirect()->route('alunos.index')->with('success', 'Aluno excluído com sucesso!');
    }
}