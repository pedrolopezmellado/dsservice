<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Borramos los datos de la tabla
        DB::table('purchases')->delete();
        DB::table('services')->delete();
        DB::table('users')->delete();
        
        // Añadimos entradas a esta tabla
        DB::table('users')->insert([
            'email' => 'aaron@gmail.com' ,
            'name' => 'Aaron',
            'password' => Hash::make('password'),
            'phone' => '111111111',
            'role' => 'admin' ]);
        
        DB::table('users')->insert([
            'email' => 'pedro@gmail.com' ,
            'name' => 'Pedro',
            'password' => Hash::make('password'),
            'phone' => '111111111' ,
            'role' => 'admin' ]);
    
        DB::table('users')->insert([
            'email' => 'dario@gmail.com' ,
            'name' => 'Dario',
            'password' => Hash::make('password'),
            'phone' => '111111111',
            'role' => 'admin' ]);
        
        DB::table('users')->insert([
            'email' => 'jose@gmail.com' ,
            'name' => 'Jose',
            'password' => Hash::make('password'),
            'phone' => '111111111' ,
            'role' => 'admin' ]);
    }
}
