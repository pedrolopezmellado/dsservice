<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Para vaciar todas las tablas se encarga el seeder de UserTableSeeder. Esto evita problemas de claves ajenas al eliminar.
        // Llamamos al fichero de semillas para la tabla users
        $this->call( UserTableSeeder::class );
        // Mostramos información por consola
        $this->command->info('User table seeded!' );
    
        // Llamamos al fichero de semillas para la tabla services
        $this->call( ServicesTableSeeder::class );
        // Mostramos información por consola
        $this->command->info('Services table seeded!' );
    
        // Llamamos al fichero de semillas para la tabla purchases
        $this->call( PurchasesTableSeeder::class );
        // Mostramos información por consola
        $this->command->info('Purchases table seeded!' );
    }
}
