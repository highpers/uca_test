<?php

use Illuminate\Database\Seeder;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos')->insert([
            'descripcion' => 'Taller de dibujo',
            'horario' => 'Viernes de 20 a 22.30',
            'profesor_id' => rand(1, 30),
            'profesor_adjunto_id' => rand(1, 30),
            'profesor_suplente_id' => rand(1, 30)
        ]);

        DB::table('cursos')->insert([
            'descripcion' => 'Algebra elemental',
            'horario' => 'Lunes y Miércoles de 15 a 16.45',
            'profesor_id' => rand(1, 30),
            'profesor_adjunto_id' => rand(1, 30),
            'profesor_suplente_id' => rand(1, 30)
        ]);

        DB::table('cursos')->insert([
            'descripcion' => 'Historia del Arte 1',
            'horario' => 'Lun. 14.30 a 16.15 - Mier. de 13.45 a 15.15',
            'profesor_id' => rand(1, 30),
            'profesor_adjunto_id' => rand(1, 30),
            'profesor_suplente_id' => rand(1, 30)
        ]);

        DB::table('cursos')->insert([
            'descripcion' => 'Historia del deporte',
            'horario' => 'Martes y Jueves de 18 a 20',
            'profesor_id' => rand(1, 30),
            'profesor_adjunto_id' => rand(1, 30),
            'profesor_suplente_id' => rand(1, 30)
        ]);
        DB::table('cursos')->insert([
            'descripcion' => 'Derecho Romano',
            'horario' => 'Martes y viernes de 9 a 10.45',
            'profesor_id' => rand(1, 30),
            'profesor_adjunto_id' => rand(1, 30),
            'profesor_suplente_id' => rand(1, 30)
        ]);
    }
}
