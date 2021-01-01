<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            'profesors', 'users'
        ]);

         $this->call(ProfesorsSeeder::class);
         $this->call(UsersSeeder::class);
    }

    protected function truncateTables(array $tables)
    {
        //DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // incompatible en postgres - descomentar para mysql
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        //DB::statement('SET FOREIGN_KEY_CHECKS=1; '); // incompatible en postgres - descomentar para mysql
    }
}

