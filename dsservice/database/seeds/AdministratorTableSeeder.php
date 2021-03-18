<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administrators')->delete();
        
        // Añadimos entradas a esta tabla
        DB::table('administrators')->insert([
            'email' => 'admin@gmail.com' ,
            'name' => 'admin',
            'password' => 'admin']);

        DB::table('administrators')->insert([
            'email' => 'root@gmail.com' ,
            'name' => 'root',
            'password' => 'root']);
    
    }
        
}
