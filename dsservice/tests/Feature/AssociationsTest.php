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
        $this->assertEquals($user->name, 'Alberto');
        
        $service = new Service();
        $service->name='Limpiar Coche';
        $service->category='Coches';
        $service->direccion='San Vicente';
        $service->valoracion=2.5;
 
        $service2 = new Service();
        $service2->name='Limpiar Coche y revision';
        $service2->category='Coches';
        $service2->direccion='San Vicente';
        $service2->valoracion=3.5;

        $user->service()->saveMany([
            $service,
            $service2
        ]);

        $this->assertEquals($user->service[0]->name, 'Limpiar Coche');
        $this->assertEquals($user->service[1]->name, 'Limpiar Coche y revision');
        
        $service2->delete();
        $service->delete();
        User::where('email', $user->email)->delete();

        /*
        // $user->service()->saveMany([$service,$service2]);
        $service->user()->associate($user);
        $service2->user()->associate($user);
        $service->user_id = $service->user->email;
        $service2->user_id = $service2->user->email;
        $service->save();
        $service2->save();

        $this->assertEquals($service->user->name, 'Alberto');
        // $this->assertEquals($service->user, $user);
        $this->assertEquals($service->user->phone, '697853421');
        $this->assertEquals($user->service[0]->name, 'Limpiar Coche');
        //$this->assertEquals($user->service[1], $service2);
        $this->assertEquals($user->service[1]->name, 'Limpiar Coche y revision');
        
        $service2->delete();
        $service->delete();
        User::where('email', $user->email)->delete();
        */

    }
}
