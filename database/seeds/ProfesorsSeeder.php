<?php

use Illuminate\Database\Seeder;

class ProfesorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Profesor::class, 80)->create();
    }
}
