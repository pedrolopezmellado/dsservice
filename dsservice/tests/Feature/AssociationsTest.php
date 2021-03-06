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
        $user->email='albrt@gmail.com';
        $user->password='password';
        $user->phone='697853421';
        $user->save();
        

        $service = new Service();
        $service->name='Limpiar Coche';
        $service->category='Coches';
        $service->direccion='San Vicente';
        $service->valoracion=2.5;
        $service->user()->associate($user);

        $service2 = new Service();
        $service2->name='Limpiar Coche y revision';
        $service2->category='Coches';
        $service2->direccion='San Vicente';
        $service2->valoracion=3.5;
        $service2->user()->associate($user);
        
        $user->service()->saveMany([$service,$service2]);

        $this->assertEquals($service->user->name, 'Alberto');
        $this->assertEquals($service->user, $user);
        $this->assertEquals($user->service[0]->name, 'Limpiar Coche');
        $this->assertEquals($user->service[1], $service2);

        $service2->delete();
        $service->delete();
        $user->delete();
        

    }
}
