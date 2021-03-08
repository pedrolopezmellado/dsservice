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
        $service->name= 'Limpiar Coche';
        $service->category= 'Coches';
        $service->direction= 'San Vicente';
        $service->valoration=2.5;
        $service->description = 'Limpieza interior y exterior de tu coche';
        $service->range_price = '15-25 €';
 
        $service2 = new Service();
        $service2->name='Limpiar camiones y revision';
        $service2->category='Camiones';
        $service2->direction='Palma de Mallorca';
        $service2->valoration=3.5;
        $service2->description = 'Limpieza interior y exterior de tu camion, además revisaremos todos los componentes del mismo';
        $service2->range_price = '55-75 €';

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
        $this->assertEquals($user->services[0]->direction, 'San Vicente');
        $this->assertEquals($user->services[0]->valoration, '2.5');
        $this->assertEquals($user->services[0]->description, 'Limpieza interior y exterior de tu coche');
        $this->assertEquals($user->services[0]->range_price, '15-25 €');


        // Comprobamos el segundo servicio
        $this->assertEquals($user->services[1]->name, 'Limpiar camiones y revision');
        $this->assertEquals($user->services[1]->category, 'Camiones');
        $this->assertEquals($user->services[1]->direction, 'Palma de Mallorca');
        $this->assertEquals($user->services[1]->valoration, '3.5');
        $this->assertEquals($user->services[1]->description, 'Limpieza interior y exterior de tu camion, además revisaremos todos los componentes del mismo');
        $this->assertEquals($user->services[1]->range_price, '55-75 €');

        // Limpiamos
        $service2->delete();
        $service->delete();
        User::where('email', $user->email)->delete();

    }

    /**
     * Checks the association Purchase-Service
     *
     * @return void
     */
    public function testAssociationPurchaseService()
    {
        $user = new User();
        $user->name='Alberto';
        $user->email='email';
        $user->password='password';
        $user->phone='111';
        $user->save();
        
        $service = new Service();
        $service->name= 'Limpiar Coche';
        $service->category= 'Coches';
        $service->direction= 'San Vicente';
        $service->valoration=2.5;
        $service->description = 'Limpieza interior y exterior de tu coche';
        $service->range_price = '15-25 €';
 
        $service2 = new Service();
        $service2->name='Limpiar camiones y revision';
        $service2->category='Camiones';
        $service2->direction='Palma de Mallorca';
        $service2->valoration=3.5;
        $service2->description = 'Limpieza interior y exterior de tu camion, además revisaremos todos los componentes del mismo';
        $service2->range_price = '55-75 €';

        $user->services()->saveMany([
            $service,
            $service2
        ]);

        $purchase = new Purchase();
        $purchase->account = 'Cuenta falsa';
        $purchase->amount = '15.5';
        $purchase->accepted = 'rejected';
        $purchase->description = 'Limpieza de honda civic';
        $purchase->user()->associate($user);
        $purchase->service()->associate($service);
        
        // Comprobamos la compra con el usuario
        $this->assertEquals($purchase->account, 'Cuenta falsa');
        $this->assertEquals($purchase->accepted, 'rejected');
        $this->assertEquals($purchase->description, 'Limpieza de honda civic');
        $this->assertEquals($purchase->amount, '15.5');
        $this->assertEquals($purchase->service_id, '3');
        // Limpiamos
        $purchase->delete();
        $service2->delete();
        $service->delete();
        User::where('email', $user->email)->delete();

    }

       /**
     * Checks the association Purchase-User
     *
     * @return void
     */
    public function testAssociationPurchaseUser()
    {
        $user = new User();
        $user->name='Alberto';
        $user->email='otro@email.com';
        $user->password='password';
        $user->phone='111';
        $user->save();
        
        $service = new Service();
        $service->name= 'Limpiar Coche';
        $service->category= 'Coches';
        $service->direction= 'San Vicente';
        $service->valoration=2.5;
        $service->description = 'Limpieza interior y exterior de tu coche';
        $service->range_price = '15-25 €';
 
        $service2 = new Service();
        $service2->name='Limpiar camiones y revision';
        $service2->category='Camiones';
        $service2->direction='Palma de Mallorca';
        $service2->valoration=3.5;
        $service2->description = 'Limpieza interior y exterior de tu camion, además revisaremos todos los componentes del mismo';
        $service2->range_price = '55-75 €';

        $user->services()->saveMany([
            $service,
            $service2
        ]);

        $purchase = new Purchase();
        $purchase->account = 'Cuenta falsa';
        $purchase->amount = '15.5';
        $purchase->accepted = 'accepted';
        $purchase->description = 'Limpieza de honda civic';
        $purchase->user()->associate($user->email);
        $purchase->service()->associate($service);

        // Comprobamos la compra con el usuario
        $this->assertEquals($purchase->account, 'Cuenta falsa');
        $this->assertEquals($purchase->accepted, 'accepted');
        $this->assertEquals($purchase->description, 'Limpieza de honda civic');
        $this->assertEquals($purchase->amount, '15.5');
        $this->assertEquals($purchase->user_id, 'otro@email.com');
        // Limpiamos
        $purchase->delete();
        $service2->delete();
        $service->delete();
        User::where('email', $user->email)->delete();

    }
    
}
