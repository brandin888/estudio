<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoryTableSeeder::class);
      
        





        $this->call(LocalsTableSeeder::class);
       
   
        $this->call(DataTypesTableSeeder::class);
        $this->call(DataTypesTableSeederCustom::class);
        $this->call(DataRowsTableSeederCustom::class);
        $this->call(DataRowsTableSeeder::class);
        
     //   $this->call(PaquetesTableSeeder::class);
     //   $this->call(ItemsTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);
        $this->call(MenusTableSeederCustom::class);
        $this->call(MenuItemsTableSeederCustom::class);
       
        $this->call(PagesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeederCustom::class);

        $this->call(PermissionsTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(PermissionRoleTableSeederCustom::class);
        $this->call(PermissionsTableSeederCustom::class);
        $this->call(UsersTableSeederCustom::class);
        
        $this->call(PostsTableSeeder::class);
      //  $this->call(PuestosTableSeeder::class);
      //  $this->call(PostulantsTableSeeder::class);
      //  $this->call(PulserasTableSeeder::class);
      //  $this->call(PrecioPulseraTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CouponsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
      //  $this->call(ProductsLocalsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(SettingsTableSeederCustom::class);
        $this->call(RolesTableSeederCustom::class);
        
      //  $this->call(SuscriptorsTableSeeder::class);    
      //  $this->call(TranslationsTableSeeder::class);

    }
}
