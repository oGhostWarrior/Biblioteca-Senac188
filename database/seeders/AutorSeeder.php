<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AutorSeeder extends Seeder
{
    public function run(){

        DB::table('autors')->insert([
            [
            'nome' => 'J.K. Rowling',
            'biografia' => 'Autora da série Harry Potter.',
            'data_nasc' => '1965-07-31',
            ],
            [
            'nome' => 'George R. R. Martin',
            'biografia' => 'Criador de As Crônicas de Gelo e Fogo.',
            'data_nasc' => '1948-09-20',
            ],
        ]);
    }
}
