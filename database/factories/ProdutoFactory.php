<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Produto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //criei uma lista de produtos para o campo nome não ficar com palavras aleatorias como se eu usasse $this->faker->word();
        $nomes = [
            'Smartphone Galaxy',
            'Notebook Inspiron',
            'Fone de Ouvido Bluetooth',
            'Mouse Gamer',
            'Monitor Full HD',
            'Teclado Mecânico',
            'Cadeira Gamer',
            'Tablet Pro',
            'Smartwatch Series',
            'Caixa de Som Portátil'
        ];

        return [
            'nome' => $this->faker->randomElement($nomes),
            'descricao' => $this->faker->sentence(),
            'preco' => $this->faker->randomFloat(2, 1, 5000),
            'quantidade_em_estoque' => $this->faker->numberBetween(1, 100),
            'status' => $this->faker->boolean(),
        ];
    }
}
