<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\User;
use App\Service;
use App\Purchase;
use App\Category;
use App\Claim;
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
        
        $coches = new Category();
        $coches->name= 'Coches';
        $coches->save();

        $service = new Service();
        $service->name= 'Limpiar Coche';
        $service->direction= 'San Vicente';
        $service->valoration=2.5;
        $service->description = 'Limpieza interior y exterior de tu coche';
        $service->range_price = '15-25 €';
        $service->user()->associate($user);
        $service->category()->associate($coches);
        
        $service->save();

        $service2 = new Service();
        $service2->name='Limpiar camiones y revision';
        $service2->direction='Palma de Mallorca';
        $service2->valoration=3.5;
        $service2->description = 'Limpieza interior y exterior de tu camion, además revisaremos todos los componentes del mismo';
        $service2->range_price = '55-75 €';
        $service2->user()->associate($user);
        $service2->category()->associate($coches);
        
        $service2->save();

        // Comprobamos el usuario
        $this->assertEquals($user->name, 'Alberto');
        $this->assertEquals($user->email, 'alberto@gmail.com');
        $this->assertEquals($user->password, 'password');
        $this->assertEquals($user->phone, '111');

        // Comprobamos el primer servicio
        $this->assertEquals($user->services[0]->name, 'Limpiar Coche');
        $this->assertEquals($user->services[0]->direction, 'San Vicente');
        $this->assertEquals($user->services[0]->valoration, '2.5');
        $this->assertEquals($user->services[0]->description, 'Limpieza interior y exterior de tu coche');
        $this->assertEquals($user->services[0]->range_price, '15-25 €');


        // Comprobamos el segundo servicio
        $this->assertEquals($user->services[1]->name, 'Limpiar camiones y revision');
        $this->assertEquals($user->services[1]->direction, 'Palma de Mallorca');
        $this->assertEquals($user->services[1]->valoration, '3.5');
        $this->assertEquals($user->services[1]->description, 'Limpieza interior y exterior de tu camion, además revisaremos todos los componentes del mismo');
        $this->assertEquals($user->services[1]->range_price, '55-75 €');

        // Limpiamos
        $service2->delete();
        $service->delete();
        User::where('email','=', $user->email)->delete();
        Category::where('name','=', $coches->name)->delete();

    }

     /**
     * Checks the association Category-Service
     *
     * @return void
     */
    public function testAssociationServiceCategory()
    {
        $user = new User();
        $user->name='Alberto';
        $user->email='alberto@gmail.com';
        $user->password='password';
        $user->phone='111';
        $user->save();
        
        $coches = new Category();
        $coches->name= 'Coches';
        $coches->save();

        $service = new Service();
        $service->name= 'Limpiar Coche';
        $service->direction= 'San Vicente';
        $service->valoration=2.5;
        $service->description = 'Limpieza interior y exterior de tu coche';
        $service->range_price = '15-25 €';
        $service->category()->associate($coches);
        $service->user()->associate($user);
        $service->save();

        $service2 = new Service();
        $service2->name='Limpiar camiones y revision';
        $service2->direction='Palma de Mallorca';
        $service2->valoration=3.5;
        $service2->description = 'Limpieza interior y exterior de tu camion, además revisaremos todos los componentes del mismo';
        $service2->range_price = '55-75 €';
        $service2->category()->associate($coches);
        $service2->user()->associate($user);
        $service2->save();

        // Comprobamos el usuario
        $this->assertEquals($coches->name, 'Coches');
      

        // Comprobamos el primer servicio
        $this->assertEquals($coches->services[0]->name, 'Limpiar Coche');
        $this->assertEquals($coches->services[0]->direction, 'San Vicente');
        $this->assertEquals($coches->services[0]->valoration, '2.5');
        $this->assertEquals($coches->services[0]->description, 'Limpieza interior y exterior de tu coche');
        $this->assertEquals($coches->services[0]->range_price, '15-25 €');
        $this->assertEquals($service->category->name, 'Coches');

        // Comprobamos el segundo servicio
        $this->assertEquals($coches->services[1]->name, 'Limpiar camiones y revision');
        $this->assertEquals($coches->services[1]->direction, 'Palma de Mallorca');
        $this->assertEquals($coches->services[1]->valoration, '3.5');
        $this->assertEquals($coches->services[1]->description, 'Limpieza interior y exterior de tu camion, además revisaremos todos los componentes del mismo');
        $this->assertEquals($coches->services[1]->range_price, '55-75 €');
        $this->assertEquals($service2->category->name, 'Coches');

        // Limpiamos
        $service2->delete();
        $service->delete();
        User::where('email','=', $user->email)->delete();
        Category::where('name','=', $coches->name)->delete();
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
        
        $coches = new Category();
        $coches->name= 'Coches';
        $coches->save();

        $service = new Service();
        $service->name= 'Limpiar Coche';
        $service->direction= 'San Vicente';
        $service->valoration=2.5;
        $service->description = 'Limpieza interior y exterior de tu coche';
        $service->range_price = '15-25 €';
        $service->category()->associate($coches);
        $service->user()->associate($user);
        $service->save();

        $service2 = new Service();
        $service2->name='Limpiar camiones y revision';
        $service2->direction='Palma de Mallorca';
        $service2->valoration=3.5;
        $service2->description = 'Limpieza interior y exterior de tu camion, además revisaremos todos los componentes del mismo';
        $service2->range_price = '55-75 €';
        $service2->category()->associate($coches);
        $service2->user()->associate($user);
        $service2->save();


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
        Category::where('name', $coches->name)->delete();

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

        $coches = new Category();
        $coches->name= 'Coches';
        $coches->save();

        $service = new Service();
        $service->name= 'Limpiar Coche';
        $service->direction= 'San Vicente';
        $service->valoration=2.5;
        $service->description = 'Limpieza interior y exterior de tu coche';
        $service->range_price = '15-25 €';
        $service->category()->associate($coches);
        $service->user()->associate($user);
        $service->save();

        $service2 = new Service();
        $service2->name='Limpiar camiones y revision';
        $service2->direction='Palma de Mallorca';
        $service2->valoration=3.5;
        $service2->description = 'Limpieza interior y exterior de tu camion, además revisaremos todos los componentes del mismo';
        $service2->range_price = '55-75 €';
        $service2->category()->associate($coches);
        $service2->user()->associate($user);
        $service2->save();


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
        echo('jose**********************');
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
        Category::where('name', $coches->name)->delete();
    }
    
    /**
     * Checks the association User-Service
     *
     * @return void
     */
    public function testAssociationClaimPurchase()
    {
        $user = new User();
        $user->name='Alberto';
        $user->email='otro@email.com';
        $user->password='password';
        $user->phone='111';
        $user->save();

        $coches = new Category();
        $coches->name= 'Coches';
        $coches->save();

        $service = new Service();
        $service->name= 'Limpiar Coche';
        $service->direction= 'San Vicente';
        $service->valoration=2.5;
        $service->description = 'Limpieza interior y exterior de tu coche';
        $service->range_price = '15-25 €';
        $service->category()->associate($coches);
        $service->user()->associate($user);
        $service->save();

        $purchase = new Purchase();
        $purchase->account = 'Cuenta falsa';
        $purchase->amount = '15.5';
        $purchase->accepted = 'rejected';
        $purchase->description = 'Limpieza de honda civic';
        $purchase->user()->associate($user);
        $purchase->service()->associate($service);
        $purchase->save();

        $claim = new Claim();
        $claim->motive= 'No me ha limpiado el coche';
        $claim->status= 'inprocess';
        $claim->purchase()->associate($purchase);
        $claim->save();

        // Comprobamos si se ha vinculado con la compra correcta accediendo a sus diferentes campos
        $this->assertEquals($claim->motive, 'No me ha limpiado el coche');
        $this->assertEquals($claim->status, 'inprocess');
        $this->assertEquals($claim->purchase->account, 'Cuenta falsa');
        $this->assertEquals($claim->purchase->user->name, 'Alberto');
        $this->assertEquals($claim->purchase->service->name, 'Limpiar Coche');
        $this->assertEquals($purchase->claim->motive, 'No me ha limpiado el coche');
        // Limpiamos
        $user->delete();
        $coches->delete();
        $service->delete();
        $purchase->delete();
        $claim->delete();
        User::where('email', $user->email)->delete();
        Category::where('name', $coches->name)->delete();
    }
}
