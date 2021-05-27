<?php

use Illuminate\Database\Seeder;

class CommentariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    

        DB::table('commentaries')->insert([
            'commentary' => 'Tremenda web' ]);

        DB::table('commentaries')->insert([
            'commentary' => 'Yo los aprobaba' ]);

        DB::table('commentaries')->insert([
            'commentary' => 'Ni tan mal' ]);

        DB::table('commentaries')->insert([
            'commentary' => 'Bien hecho grupo' ]);

        DB::table('commentaries')->insert([
            'commentary' => 'Prueba de comentario' ]);
            
        DB::table('commentaries')->insert([
            'commentary' => 'Parece que va bien todo' ]);
    }
}
