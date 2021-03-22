<?php

use Illuminate\Database\Seeder;

class ClaimsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('claims')->insert([
            'motive' => 'No es lo que pedí' ,
            'status' => 'inprocess',
            'administrator_id' => 'admin@gmail.com',
            'user_id' => 'pedro@gmail.com',
            'service_id' => '2' ]);
    }
}
