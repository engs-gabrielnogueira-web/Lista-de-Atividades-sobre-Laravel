@extends('layouts.app')

@section('content')
    <h2>Alunos por Curso</h2>

    @forelse ($cursos as $curso)
        <div style="border: 1px solid #ccc; padding: 15px; margin-bottom: 20px;">
            <h3>Curso: {{ $curso->nome }} ({{ $curso->sigla }})</h3>

            <ul>
                @forelse ($curso->alunos as $aluno)
                    <li><strong>{{ $aluno->nome }}</strong> - {{ $aluno->email }} (CPF: {{ $aluno->cpf }})</li>
                @empty
                    <li><em>Nenhum aluno cadastrado neste curso.</em></li>
                @endforelse
            </ul>
        </div>
    @empty
        <p>Nenhum curso cadastrado.</p>
    @endforelse
@endsection