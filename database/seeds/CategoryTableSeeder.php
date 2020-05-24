<?php

use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['name' => 'Planes en casa', 'slug' => 'planes-en-casa', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Tecnología', 'slug' => 'tecnologia', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Zapatos', 'slug' => 'zapatos', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Deportes', 'slug' => 'deportes', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Accesorios', 'slug' => 'accesorios', 'created_at' => $now, 'updated_at' => $now],
              ['name' => 'Cocina', 'slug' => 'cocina', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Muebles', 'slug' => 'muebles', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Dormitorio', 'slug' => 'dormitorio', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Decohogar', 'slug' => 'decohogar', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Moda mujer', 'slug' => 'moda-mujer', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Mascotas', 'slug' => 'mascotas', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Niños', 'slug' => 'niños', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Moda hombre', 'slug' => 'moda-hombre', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Belleza', 'slug' => 'belleza', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Electrohogar', 'slug' => 'electrohogar', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Limpieza', 'slug' => 'limpieza', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Tomatodos', 'slug' => 'tomatodos', 'created_at' => $now, 'updated_at' => $now],
          
        ]);
    }
}
