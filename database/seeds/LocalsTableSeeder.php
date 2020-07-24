<?php

use Illuminate\Database\Seeder;


class LocalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('locals')->delete();
        
        \DB::table('locals')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Lima Este',
                'distrito' => 'Ate',
                'direccion' => 'Asociación praderas de pariachi Mz. E Lt. 25, Ate Vitarte',
                'telefono' => '401-3742',
                'latitud' => '-11.999391',
                'longitud' => '-76.836318',
                'iframe' => 'Open Cercado de Lima 15476',
                'orden' => 1,
                'estado' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Cercado de Lima',
                'distrito' => 'Lima',
                'direccion' => 'Jirón Ayacucho 884, Cercado de Lima',
                'telefono' => '916284386',
                'latitud' => '-12.054969',
                'longitud' => '-77.028921',
            'iframe' => 'Open Cercado de Lima',
                'orden' => 2,
                'estado' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));

    }
};