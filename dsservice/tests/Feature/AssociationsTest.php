<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\User;
use App\Service;
use App\Purchase;

class AssociationsTest extends TestCase
{
    /**
     * Checks the association User-Service
     *
     * @return void
     */
    public function testAssociationServiceUser()
    {
        $user = new User();
        $user->name='Alberto';
        $user->email='alberto@gmail.com';
        $user->password='password';
        $user->phone='111';
        $user->save();
        
        $service = new Service();
        $service->name='Limpiar Coche';
        $service->category='Coches';
        $service->direccion='San Vicente';
        $service->valoracion=2.5;
 
        $service2 = new Service();
        $service2->name='Limpiar camiones y revision';
        $service2->category='Camiones';
        $service2->direccion='Mayorca';
        $service2->valoracion=3.5;

        $user->services()->saveMany([
            $service,
            $service2
        ]);

        // Comprobamos el usuario
        $this->assertEquals($user->name, 'Alberto');
        $this->assertEquals($user->email, 'alberto@gmail.com');
        $this->assertEquals($user->password, 'password');
        $this->assertEquals($user->phone, '111');

        // Comprobamos el primer servicio
        $this->assertEquals($user->services[0]->name, 'Limpiar Coche');
        $this->assertEquals($user->services[0]->category, 'Coches');
        $this->assertEquals($user->services[0]->direccion, 'San Vicente');
        $this->assertEquals($user->services[0]->valoracion, '2.5');

        // Comprobamos el segundo servicio
        $this->assertEquals($user->services[1]->name, 'Limpiar camiones y revision');
        $this->assertEquals($user->services[1]->category, 'Camiones');
        $this->assertEquals($user->services[1]->direccion, 'Mayorca');
        $this->assertEquals($user->services[1]->valoracion, '3.5');

        // Limpiamos
        $service2->delete();
        $service->delete();
        User::where('email', $user->email)->delete();

    }

    /**
     * Checks the association User-Service
     *
     * @return void
     */
    public function testAssociationPurchaseUser()
    {
        $user = new User();
        $user->name='Alberto';
        $user->email='alberto@gmail.com';
        $user->password='password';
        $user->phone='111';
        $user->save();
        
        $service = new Service();
        $service->name='Limpiar Coche';
        $service->category='Coches';
        $service->direccion='San Vicente';
        $service->valoracion=2.5;
 
        $service2 = new Service();
        $service2->name='Limpiar camiones y revision';
        $service2->category='Camiones';
        $service2->direccion='Mayorca';
        $service2->valoracion=3.5;

        $user->services()->saveMany([
            $service,
            $service2
        ]);

        // Comprobamos el usuario
        $this->assertEquals($user->name, 'Alberto');
        $this->assertEquals($user->email, 'alberto@gmail.com');
        $this->assertEquals($user->password, 'password');
        $this->assertEquals($user->phone, '111');

        // Comprobamos el primer servicio
        $this->assertEquals($user->services[0]->name, 'Limpiar Coche');
        $this->assertEquals($user->services[0]->category, 'Coches');
        $this->assertEquals($user->services[0]->direccion, 'San Vicente');
        $this->assertEquals($user->services[0]->valoracion, '2.5');

        // Comprobamos el segundo servicio
        $this->assertEquals($user->services[1]->name, 'Limpiar camiones y revision');
        $this->assertEquals($user->services[1]->category, 'Camiones');
        $this->assertEquals($user->services[1]->direccion, 'Mayorca');
        $this->assertEquals($user->services[1]->valoracion, '3.5');

        // Limpiamos
        $service2->delete();
        $service->delete();
        User::where('email', $user->email)->delete();
    }

}
