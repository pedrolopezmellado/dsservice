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
        
        $table->string('account');
        $table->float('amount');
        //Inicialmente 0, si se acepta 1, si se rechaza -1
        $table->integer('accepted');
        $table->string('description');
        $table->timestamps(); 
        $table->string('user_id');
        $table->foreign('user_id')->references('email')->on('users');
        $table->unsignedBigInteger('service_id');
        $table->foreign('service_id')->references('id')->on('services');

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
    }
}
