<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplicação Laravel')</title>
</head>
<body>
    <header>
        <h1>Sistema de Alunos</h1>
        @include('partials.header')
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>