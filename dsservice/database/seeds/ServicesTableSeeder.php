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
            'valoration' => '0',
            'description' => 'Soy un joven programador apasionado de las pruebas unitarias y encontrar fallos.',
            'range_price' => '500-1000',
            'image' => 'lenguaje-de-programación.jpg',
            'user_id' => 'rock@gmail.com' ,
            'category_id' => 'Programación']);  // Programacion
    
        DB::table('services')->insert([
            'name' => 'Coches relucientes' ,
            'category_id' => 'Coches',
            'direction' => 'Aspe',
            'valoration' => '0',
            'description' => 'Lavadero de coches en Aspe. Lavados exteriores e interiores de su vehículo',
            'range_price' => '12-40',
            'image' => '484165.jpg',
            'user_id' => 'bejo@gmail.com' ]);

        DB::table('services')->insert([
            'name' => 'Dibujos estilo anime' ,
            'category_id' => 'Arte',
            'direction' => 'Alicante',
            'valoration' => '0',
            'description' => 'Dibujo lo que me propongas con estilo japonés.',
            'range_price' => '10-40',
            'image' => 'dibujar-anime.jpg',
            'user_id' => 'willyrex@gmail.com' ]);  

        DB::table('services')->insert([
            'name' => 'Especialista en paisajes' ,
            'category_id' => 'Arte',
            'direction' => 'Alicante',
            'valoration' => '0',
            'description' => 'Con una breve descripción de un paisaje dibujaré lo que me propongas.',
            'range_price' => '20-55',
            'user_id' => 'dario@gmail.com' ]); 

        DB::table('services')->insert([
            'name' => 'Covers con distintas voces' ,
            'category_id' => 'Música',
            'direction' => 'Alcoi',
            'valoration' => '0',
            'description' => 'Hago covers cantando como distintos personajes como pueden ser Homer Simpson, Peter Griffin o Shrek.',
            'range_price' => '15-25',
            'image' => 'cantar.jpg',
            'user_id' => 'sandler@gmail.com' ]); 

        DB::table('services')->insert([
            'name' => 'Soprano cantante de ópera' ,
            'category_id' => 'Música',
            'direction' => 'Albacete',
            'valoration' => '0',
            'description' => 'Con esto del covid han cerrado los teatros y hay que ganarse la vida.',
            'range_price' => '40-80',
            'image' => 'opera.jpg',
            'user_id' => 'bejo@gmail.com' ]); 
        
        DB::table('services')->insert([
            'name' => 'Piano de miaus' ,
            'category_id' => 'Música',
            'direction' => 'Albacete',
            'valoration' => '0',
            'description' => 'Toco la cancion que me pidas con un gato que dice miau.',
            'range_price' => '40-80',
            'user_id' => 'dario@gmail.com' ]); 

        DB::table('services')->insert([
            'name' => 'Guitarrista' ,
            'category_id' => 'Música',
            'direction' => 'Albacete',
            'valoration' => '0',
            'description' => 'Texto de ejemplo.',
            'range_price' => '40-80',
            'image' => 'guitar.jpg',
            'user_id' => 'sandler@gmail.com' ]); 

        DB::table('services')->insert([
            'name' => 'Toco la trompeta' ,
            'category_id' => 'Música',
            'direction' => 'Albacete',
            'valoration' => '0',
            'description' => 'Texto de ejemplo.',
            'range_price' => '40-80',
            'image' => 'trompeta.jpg',
            'user_id' => 'sandler@gmail.com' ]); 

        DB::table('services')->insert([
            'name' => 'Toco el violin' ,
            'category_id' => 'Música',
            'direction' => 'Albacete',
            'valoration' => '0',
            'description' => 'Texto de ejemplo.',
            'range_price' => '40-80',
            'image' => 'violin.jpg',
            'user_id' => 'willyrex@gmail.com' ]); 

        DB::table('services')->insert([
            'name' => 'Cantante' ,
            'category_id' => 'Música',
            'direction' => 'Albacete',
            'valoration' => '0',
            'description' => 'Texto de ejemplo.',
            'range_price' => '40-80',
            'user_id' => 'willyrex@gmail.com' ]); 

        DB::table('services')->insert([
            'name' => 'Flautista' ,
            'category_id' => 'Música',
            'direction' => 'Albacete',
            'valoration' => '0',
            'description' => 'Texto de ejemplo.',
            'range_price' => '40-80',
            'user_id' => 'rock@gmail.com' ]); 

        DB::table('services')->insert([
            'name' => 'Banda de Rock' ,
            'category_id' => 'Música',
            'direction' => 'Albacete',
            'valoration' => '0',
            'description' => 'Texto de ejemplo.',
            'range_price' => '40-80',
            'user_id' => 'rock@gmail.com' ]); 
    }
}
