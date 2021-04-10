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
            'direction' => 'Ibiza y Santa Pola',
            'valoration' => '5',
            'description' => 'Soy un joven programador apasionado de las pruebas unitarias y encontrar fallos.',
            'range_price' => '500-1000',
            'user_id' => 'aaron@gmail.com' ,
            'category_id' => 'Coches']);  // Programacion
    
        DB::table('services')->insert([
            'name' => 'Coches relucientes' ,
            'category_id' => 'Coches',
            'direction' => 'Aspe',
            'valoration' => '3',
            'description' => 'Lavadero de coches en Aspe. Lavados exteriores e interiores de su vehículo',
            'range_price' => '12-40',
            'user_id' => 'jose@gmail.com' ]);
    }
}
