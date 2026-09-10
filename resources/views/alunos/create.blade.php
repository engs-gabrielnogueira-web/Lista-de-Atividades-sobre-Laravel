@extends('layouts.app')

@section('content')
    <h2>Cadastrar Aluno</h2>

    <form action="{{ route('alunos.store') }}" method="POST">
        @csrf

        <div>
            <label for="nome">Nome:</label><br>
            <input type="text" id="nome" name="nome" value="{{ old('nome') }}" required>
        </div>
        <br>

        <div>
            <label for="email">E-mail:</label><br>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <br>

        <div>
            <label for="cpf">CPF:</label><br>
            <input type="text" id="cpf" name="cpf" value="{{ old('cpf') }}" required>
        </div>
        <br>

        <button type="submit">Salvar Aluno</button>
    </form>
@endsection