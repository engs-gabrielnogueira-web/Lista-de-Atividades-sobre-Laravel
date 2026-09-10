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
            'nome'  => 'required|string|max:255',
            'email' => 'required|email|unique:alunos,email,' . $alunoId,
            'cpf'   => 'required|string|size:11|unique:alunos,cpf,' . $alunoId,
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required'  => 'O campo nome é de preenchimento obrigatório.',
            'nome.max'       => 'O nome não pode ter mais de 255 caracteres.',
            'email.required' => 'Por favor, informe o seu endereço de e-mail.',
            'email.email'    => 'Insira um formato de e-mail válido (ex: aluno@email.com).',
            'email.unique'   => 'Este e-mail já está cadastrado em nosso sistema.',
            'cpf.required'   => 'O campo CPF é obrigatório.',
            'cpf.size'       => 'O CPF deve conter exatamente 11 dígitos numéricos.',
            'cpf.unique'     => 'Este CPF já consta em nossa base de dados.',
        ];
    }
}