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
        // Borramos los datos de la tabla en la clase UserTableSeeder para tener un mayor control
        // DB::table('purchases')->delete();

        // Añadimos entradas a esta tabla
        DB::table('purchases')->insert([
            'account' => 'MUCHOMONEY' ,
            'amount' => '600',
            'accepted' => 'accepted',
            'description' => 'Hola buenas, me gustaría que le pasaras unas pruebas unitarias a mi programa',
            'user_id' => 'dario@gmail.com',
            'service_id' => '1' ]);

        DB::table('purchases')->insert([
            'account' => 'MONEYMONEY' ,
            'amount' => '12',
            'accepted' => 'rejected',
            'description' => 'Hola buenas, ¿Está disponible el día 15/03/2021 a las 11:00?',
            'user_id' => 'pedro@gmail.com',
            'service_id' => '2' ]);

        DB::table('purchases')->insert([
            'account' => '821921309528' ,
            'amount' => '25',
            'accepted' => 'accepted',
            'description' => 'Dibujame como uno de los dibujos chinitos esos',
            'user_id' => 'dario@gmail.com',
            'service_id' => '3' ]);

        DB::table('purchases')->insert([
            'account' => '821921309528' ,
            'amount' => '65',
            'accepted' => 'accepted',
            'description' => 'Cantame la Traviata',
            'user_id' => 'dario@gmail.com',
            'service_id' => '6' ]);  

        DB::table('purchases')->insert([
            'account' => '821921309528' ,
            'amount' => '25',
            'accepted' => 'accepted',
            'description' => 'Cantame la cancion de Shrek con la voz de Petter Griffin',
            'user_id' => 'dario@gmail.com',
            'service_id' => '5' ]);  

        DB::table('purchases')->insert([
            'account' => '821921309528' ,
            'amount' => '25',
            'accepted' => 'accepted',
            'description' => 'Compra de relleno',
            'user_id' => 'dario@gmail.com',
            'service_id' => '3' ]); 

        DB::table('purchases')->insert([
            'account' => '821921309528' ,
            'amount' => '25',
            'accepted' => 'accepted',
            'description' => 'Compra de relleno',
            'user_id' => 'dario@gmail.com',
            'service_id' => '4' ]); 

        DB::table('purchases')->insert([
            'account' => '821921309528' ,
            'amount' => '25',
            'accepted' => 'accepted',
            'description' => 'Compra de relleno',
            'user_id' => 'dario@gmail.com',
            'service_id' => '2' ]); 

        DB::table('purchases')->insert([
            'account' => '821921309528' ,
            'amount' => '25',
            'accepted' => 'accepted',
            'description' => 'Compra de relleno',
            'user_id' => 'dario@gmail.com',
            'service_id' => '5' ]); 

        DB::table('purchases')->insert([
            'account' => '821921309528' ,
            'amount' => '25',
            'accepted' => 'accepted',
            'description' => 'Compra de relleno',
            'user_id' => 'dario@gmail.com',
            'service_id' => '3' ]); 

        DB::table('purchases')->insert([
            'account' => '821921309528' ,
            'amount' => '25',
            'accepted' => 'accepted',
            'description' => 'Compra de relleno',
            'user_id' => 'dario@gmail.com',
            'service_id' => '4' ]); 
    }
}
