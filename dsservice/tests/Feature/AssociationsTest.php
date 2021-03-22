<?php

namespace Tests\Feature;

use App\Administrator;
use App\Claim;
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

        //Comprobamos que el servicio se ha conectado con su usuario
        $this->assertEquals($service->user->name, 'Alberto');

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

        $user2 = new User();
        $user2->name='Walter Alejandro';
        $user2->email='wa2';
        $user2->password='password';
        $user2->phone='111';
        $user2->save();
        
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
        $purchase->save();

        $purchase2 = new Purchase();
        $purchase2->account = 'Cuenta falsa';
        $purchase2->amount = '15.5';
        $purchase2->accepted = 'accepted';
        $purchase2->description = 'Limpieza de renault captur';
        $purchase2->user()->associate($user2);
        $purchase2->service()->associate($service);
        $purchase2->save();
        
        // Comprobamos la compra con el servicio
        $this->assertEquals($purchase->account, 'Cuenta falsa');
        $this->assertEquals($purchase->accepted, 'rejected');
        $this->assertEquals($purchase->description, 'Limpieza de honda civic');
        $this->assertEquals($purchase->amount, '15.5');
        $this->assertEquals($purchase2->service->name, 'Limpiar Coche');

        
        // Comprobamos que nuestras dos compras estan asociadas al servicio en cuestion
        $this->assertEquals($service->purchases[0]->account, 'Cuenta falsa');
        $this->assertEquals($service->purchases[0]->amount, '15.5');
        $this->assertEquals($service->purchases[0]->accepted, 'rejected');
        $this->assertEquals($service->purchases[0]->description, 'Limpieza de honda civic');

        $this->assertEquals($service->purchases[1]->account, 'Cuenta falsa');
        $this->assertEquals($service->purchases[1]->amount, '15.5');
        $this->assertEquals($service->purchases[1]->accepted, 'accepted');
        $this->assertEquals($service->purchases[1]->description, 'Limpieza de renault captur');

    
        // Limpiamos
        $purchase->delete();
        $purchase2->delete();
        $service2->delete();
        $service->delete();
        User::where('email', $user->email)->delete();
        User::where('email', $user2->email)->delete();

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
        
        $user2 = new User();
        $user2->name='Walter Alejandro';
        $user2->email='wa2@gmail.com';
        $user2->password='password';
        $user2->phone='111';
        $user2->save();

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
        $purchase->user()->associate($user2);
        $purchase->service()->associate($service);
        $purchase->save();

        // Comprobamos la compra con el usuario
        $this->assertEquals($purchase->account, 'Cuenta falsa');
        $this->assertEquals($purchase->accepted, 'accepted');
        $this->assertEquals($purchase->description, 'Limpieza de honda civic');
        $this->assertEquals($purchase->amount, '15.5');
        $this->assertEquals($purchase->user->name, 'Walter Alejandro');

        // Comprobamos que la compra se ha asociado con el usuario correcto
        $this->assertEquals($user2->purchases[0]->account, 'Cuenta falsa');
        $this->assertEquals($user2->purchases[0]->amount, '15.5');
        $this->assertEquals($user2->purchases[0]->accepted, 'accepted');
        $this->assertEquals($user2->purchases[0]->description, 'Limpieza de honda civic');

        // Limpiamos
        $purchase->delete();
        $service2->delete();
        $service->delete();
        User::where('email', $user->email)->delete();
        User::where('email', $user2->email)->delete();
    }

    public function testAssociationClaimUser(){
        $user = new User();
        $user->name='Alberto';
        $user->email='email';
        $user->password='password';
        $user->phone='111';
        $user->save();

        $user2 = new User();
        $user2->name='Walter Alejandro';
        $user2->email='wa2';
        $user2->password='password';
        $user2->phone='111';
        $user2->save();
        
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

        $admin = new Administrator();
        $admin->name='admin';
        $admin->email='admin@gmail.com';
        $admin->password='password';
        $admin->save();

        $claim = new Claim();
        $claim->motive='No me revisaron la presión de los neumáticos' ;
        $claim->status = 'inprocess';
        $claim->user()->associate($user);
        $claim->service()->associate($service2);
        $claim->administrator()->associate($admin);
        $claim->save();

        $this->assertEquals($claim->motive, 'No me revisaron la presión de los neumáticos');
        $this->assertEquals($claim->status, 'inprocess');
        $this->assertEquals($claim->user->name, 'Alberto');
        $this->assertEquals($claim->user->email, 'email');
        $this->assertEquals($user->claims[0]->motive, 'No me revisaron la presión de los neumáticos');
        $claim->delete();
        $service2->delete();
        $service->delete();
        Administrator::where('email', $admin->email)->delete();
        User::where('email', $user->email)->delete();
        User::where('email', $user2->email)->delete();

    }

    public function testAssociationClaimService(){
        $user = new User();
        $user->name='Alberto';
        $user->email='email';
        $user->password='password';
        $user->phone='111';
        $user->save();

        $user2 = new User();
        $user2->name='Walter Alejandro';
        $user2->email='wa2';
        $user2->password='password';
        $user2->phone='111';
        $user2->save();
        
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

        $admin = new Administrator();
        $admin->name='admin';
        $admin->email='admin@gmail.com';
        $admin->password='password';
        $admin->save();

        $claim = new Claim();
        $claim->motive='No me revisaron la presión de los neumáticos' ;
        $claim->status = 'inprocess';
        $claim->user()->associate($user2);
        $claim->service()->associate($service2);
        $claim->administrator()->associate($admin);
        $claim->save();

        $this->assertEquals($claim->motive, 'No me revisaron la presión de los neumáticos');
        $this->assertEquals($claim->status, 'inprocess');
        $this->assertEquals($claim->user->name, 'Walter Alejandro');
        $this->assertEquals($claim->user->email, 'wa2');
        $this->assertEquals($service2->claims[0]->motive, 'No me revisaron la presión de los neumáticos');
        $this->assertEquals($service2->claims[0]->status, 'inprocess');

        $claim->delete();
        $service2->delete();
        $service->delete();
        User::where('email', $user->email)->delete();
        User::where('email', $user2->email)->delete();
    }

    public function testAssociationClaimAdministrator(){

    }



    
}
