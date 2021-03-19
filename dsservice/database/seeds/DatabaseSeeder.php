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
        $this->call( UsersTableSeeder::class );
        // Mostramos información por consola
        $this->command->info('Users table seeded!' );
    
        // Llamamos al fichero de semillas para la tabla services
        $this->call( ServicesTableSeeder::class );
        // Mostramos información por consola
        $this->command->info('Services table seeded!' );
    
        // Llamamos al fichero de semillas para la tabla purchases
        $this->call( PurchasesTableSeeder::class );
        // Mostramos información por consola
        $this->command->info('Purchases table seeded!' );

<<<<<<< HEAD
        // Llamamos al fichero de semillas para la tabla claims
        $this->call( ClaimsTableSeeder::class );
        // Mostramos información por consola
        $this->command->info('Claims table seeded!' );
=======
        // Llamamos al fichero de semillas para la tabla purchases
        $this->call( AdministratorsTableSeeder::class );
        // Mostramos información por consola
        $this->command->info('Administrators table seeded!' );
>>>>>>> 9868f306136351d6ef7377f41199452c9d940fe8
    }
}
