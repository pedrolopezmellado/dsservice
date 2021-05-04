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
            'purchase_id' => '1' ]);

        DB::table('claims')->insert([
            'motive' => 'No me ha gustado' ,
            'status' => 'accepted',
            'purchase_id' => '3' ]);

        DB::table('claims')->insert([
            'motive' => 'No me ha gustado' ,
            'status' => 'rejected',
            'purchase_id' => '5' ]);

        DB::table('claims')->insert([
            'motive' => 'No ha realizado todavía lo que pedí' ,
            'status' => 'inprocess',
            'purchase_id' => '4' ]);

      
    }
}
