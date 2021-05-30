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
            'commentary' => 'Me gusta mucho el diseño!' ]);

        DB::table('commentaries')->insert([
            'commentary' => 'Ayer publiqué mi primer servicio, ¡gracias!' ]);

        DB::table('commentaries')->insert([
            'commentary' => 'Bien hecho grupo' ]);

        DB::table('commentaries')->insert([
            'commentary' => 'Prueba de comentario' ]);
            
        DB::table('commentaries')->insert([
            'commentary' => 'Comentario de prueba' ]);
    }
}
