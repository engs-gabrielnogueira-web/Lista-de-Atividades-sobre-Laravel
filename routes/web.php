<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/sobre', function () {
    return 'Página Sobre';
});

Route::get('/alunos', function () {
    return 'Página de Alunos';
});

Route::get('/contato', function () {
    return 'Página de Contato';
});
Route::get('/produto/{id}', function ($id) {
    return "Exibindo produto com o ID: " . $id;
});

Route::get('/categoria/{id}', function ($id) {
    return "Exibindo categoria com o ID: " . $id;
});

Route::get('/usuario/{id}', function ($id) {
    return "Exibindo usuário com o ID: " . $id;
});

use App\Http\Controllers\alunoController;

Route::resource('alunos', alunoController::class);