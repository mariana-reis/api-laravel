<?php

namespace Database\Seeders;

use App\Models\Receita;
use Illuminate\Database\Seeder;

class ReceitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Receita::factory(5)->create();

    }
}
