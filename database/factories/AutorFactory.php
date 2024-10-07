<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Autor;

class AutorFactory extends Factory
{
    protected $model = Autor::class;
    public function definition(){
        return [
            'nome' => $this->faker->name(),
            'biografia' => $this->faker->paragraph(),
            'data_nasc' => $this->faker->date(),
        ];
    }

    public function run(){
        Autor::factory()->count(10)->create();
    }

}
