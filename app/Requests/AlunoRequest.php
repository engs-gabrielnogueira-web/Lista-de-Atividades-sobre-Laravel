<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $alunoId = $this->route('aluno') ? $this->route('aluno')->id : null;

        return [
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:alunos,email,' . $alunoId,
            'cpf'   => 'required|string|size:11|unique:alunos,cpf,' . $alunoId,
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required'  => 'O campo nome é obrigatório.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email'    => 'Informe um e-mail válido.',
            'email.unique'   => 'Este e-mail já está cadastrado.',
            'cpf.required'   => 'O campo CPF é obrigatório.',
            'cpf.size'       => 'O CPF deve possuir exatamente 11 dígitos.',
            'cpf.unique'     => 'Este CPF já está cadastrado.',
        ];
    }
}