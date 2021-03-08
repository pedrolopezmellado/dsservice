<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Borramos los datos de la tabla en UserTableSeeder
        // DB::table('services')->delete();
        
        // Añadimos entradas a esta tabla
        DB::table('services')->insert([
            'name' => 'Desarrollo pruebas unitarias' ,
            'category' => 'Programación',
            'direccion' => 'Ibiza y Santa Pola',
            'valoracion' => '5',
            'user_id' => 'aaron@gmail.com' ]);
    
        DB::table('services')->insert([
            'name' => 'Coches relucientes' ,
            'category' => 'Coches',
            'direccion' => 'Aspe',
            'valoracion' => '3',
            'user_id' => 'jose@gmail.com' ]);
    }
}
