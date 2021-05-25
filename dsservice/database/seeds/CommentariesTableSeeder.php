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
            'commentary' => 'Prueba de comentario' ]);
    }
}
