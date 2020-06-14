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
                'nombre' => 'Cercado de Lima',
                'distrito' => 'Lima',
                'direccion' => 'Jirón Inambari 716, cercado de Lima',
                'telefono' => '916284386',
                'latitud' => '-12.055357',
                'longitud' => '-77.027842',
            'iframe' => 'Open Cercado de Lima',
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
                'direccion' => 'Jirón Inambari 650, cercado de Lima',
                'telefono' => '916284386',
                'latitud' => '-12.055203',
                'longitud' => '-77.029339',
            'iframe' => 'Open Cercado de Lima',
                'orden' => 2,
                'estado' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));

    }
};