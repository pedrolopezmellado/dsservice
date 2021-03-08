<?php

use Illuminate\Database\Seeder;

class PurchasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Borramos los datos de la tabla en UserTableSeeder
        // DB::table('purchases')->delete();
        
        // Añadimos entradas a esta tabla
        DB::table('purchases')->insert([
            'datos_bancarios' => 'MUCHOMONEY' ,
            'importe' => '420.5',
            'aceptada' => '1',
            'descripcion' => 'Hola buenas, me gustaría que le pasaras unas pruebas unitarias a mi programa',
            'user_id' => 'dario@gmail.com',
            'service_id' => '1' ]);

        DB::table('purchases')->insert([
            'datos_bancarios' => 'MONEYMONEY' ,
            'importe' => '12.9',
            'aceptada' => '0',
            'descripcion' => 'Hola buenas, ¿Está disponible el día 15/03/2021 a las 11:00?',
            'user_id' => 'pedro@gmail.com',
            'service_id' => '2' ]);
    }
}
