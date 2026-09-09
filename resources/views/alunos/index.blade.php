@extends('layouts.app')

@section('title', 'Lista de Alunos')

@section('content')
    <h2>Alunos Cadastrados</h2>

    @php
        $alunos = [
            ['id' => 1, 'nome' => 'Gabriel'],
            ['id' => 2, 'nome' => 'Ana']
        ];
    @endphp

    @if(count($alunos) > 0)
        <ul>
            @foreach($alunos as $aluno)
                <li>{{ $aluno['id'] }} - {{ $aluno['nome'] }}</li>
            @endforeach
        </ul>
    @else
        <p>Nenhum aluno encontrado.</p>
    @endif
@endsection