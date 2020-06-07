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
                'nombre' => 'Open plaza - Angamos',
                'distrito' => 'Angamos',
                'direccion' => 'Av. Angamos 1803, Surquillo 15036',
                'telefono' => '5698985',
                'latitud' => '-12.111649',
                'longitud' => '-77.012603',
            'iframe' => 'Open Plaza Angamos 4er nivel,  en el Patio de Comidas (frente a Cinemark)',
                'orden' => 1,
                'estado' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Megaplaza - Lima Norte',
                'distrito' => 'Lima Norte',
                'direccion' => 'Av Alfredo Mendiola 3698, Independencia 15311',
                'telefono' => '989899569',
                'latitud' => '-11.993087',
                'longitud' => '-77.061194',
            'iframe' => 'Megaplaza Norte 3er Nivel en la Plaza Conquistadores (al costado de Cinemark)',
                'orden' => 2,
                'estado' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Real Plaza - Cusco',
                'distrito' => 'Cusco',
                'direccion' => 'Av. Collasuyo s/n. Real Plaza Cusco, Cusco 08000',
                'telefono' => '989898547',
                'latitud' => '-13.522792',
                'longitud' => '-71.950128',
                'iframe' => 'Real Plaza Cusco 2do nivel, en el patio de comidas.',
                'orden' => 3,
                'estado' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));

    }
};
