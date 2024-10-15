<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable =  [
        'nome',
        'descricao',
        'preco',
        'quantidade_em_estoque',
        'status'
    ];

    function regras() {
        return [
            'nome' => 'required|min:3',
            'descricao' => 'max:255',
            'preco' => 'required|numeric|min:0.01',
            'quantidade_em_estoque' => 'required|integer',
            'status' => 'required|boolean'
        ];
    }

    public function feedback() {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'nome.min' => 'O campo nome deve conter no mínimo 3 caracteres',
            'descricao.max' => 'O campo descrição deve conter no máximo 255 caracteres',
            'preco.min' => 'O campo preço deve ser maior que 0',
            'status.boolean' => 'O campo status é booleano, informe 0 ou 1',
            'integer' => 'O campo quantidade_em_estoque deve ser inteiro'
        ];
    }
    
}
