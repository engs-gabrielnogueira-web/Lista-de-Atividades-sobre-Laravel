<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Http\Requests\AlunoRequest;

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

    public function store(AlunoRequest $request)
    {
        Aluno::create($request->validated());

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

    public function update(AlunoRequest $request, Aluno $aluno)
    {
        $aluno->update($request->validated());

        return redirect()->route('alunos.index')->with('success', 'Aluno atualizado com sucesso!');
    }

    public function destroy(Aluno $aluno)
    {
        $aluno->delete();

        return redirect()->route('alunos.index')->with('success', 'Aluno excluído com sucesso!');
    }
}