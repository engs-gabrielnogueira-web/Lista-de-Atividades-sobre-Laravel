<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class alunoController extends Controller
{

    public function index()
    {
        $alunos = Aluno::with('curso')->get();
        return view('alunos.index', compact('alunos'));
    }

    public function create()
    {
        $this->authorize('create', Aluno::class);
        return view('alunos.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Aluno::class);

        $validated = $request->validate([
            'nome'     => 'required|string|max:255',
            'email'    => 'required|email|unique:alunos,email',
            'cpf'      => 'required|string|unique:alunos,cpf',
            'curso_id' => 'nullable|exists:cursos,id',
            'user_id'  => 'nullable|exists:users,id',
        ]);

        Aluno::create($validated);

        return redirect()->route('alunos.index')->with('success', 'Aluno cadastrado com sucesso!');
    }

    public function edit(Aluno $aluno)
    {
        $this->authorize('update', $aluno);
        return view('alunos.edit', compact('aluno'));
    }

    public function update(Request $request, Aluno $aluno)
    {
        $this->authorize('update', $aluno);

        $validated = $request->validate([
            'nome'     => 'required|string|max:255',
            'email'    => 'required|email|unique:alunos,email,' . $aluno->id,
            'cpf'      => 'required|string|unique:alunos,cpf,' . $aluno->id,
            'curso_id' => 'nullable|exists:cursos,id',
            'user_id'  => 'nullable|exists:users,id',
        ]);

        $aluno->update($validated);

        return redirect()->route('alunos.index')->with('success', 'Aluno atualizado com sucesso!');
    }
    public function destroy(Aluno $aluno)
    {
        $this->authorize('delete', $aluno);

        $aluno->delete();

        return redirect()->route('alunos.index')->with('success', 'Aluno removido com sucesso!');
    }
}