<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Sin Categoria' 
             ]);

        DB::table('categories')->insert([
            'name' => 'Coches' 
             ]);

        DB::table('categories')->insert([
           'name' => 'Programación' 
            ]);
        DB::table('categories')->insert([
           'name' => 'Arte' 
            ]);
        DB::table('categories')->insert([
           'name' => 'Música' 
            ]);
        DB::table('categories')->insert([
           'name' => 'Diseño' 
            ]);
    }
}
