<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Services\ClaimService;
use App\Services\ServiceService;
use App\Services\UserService;
use App\Services\PurchaseService;
use App\Services\CategoryService;

class WebController extends Controller
{
    public function abrirDisputa(){
        return view("abrirDisputa"); 
    }

    public function crearDisputa(Request $request){
        if($request->has('motive')){
            $motive = $request->input('motive');
            $purchase = 1;
            $claim = ClaimService::new($motive, $purchase);
        }
        return view("abrirDisputa"); 
    }

    public function listServices(){
        $services = ServiceService::all();
        $categorias = CategoryService::all();

        return view("homeInvitado", ["services"=> $services,'categorias' => $categorias]);
    }

    public function buscador(Request $request){
        $categorias = CategoryService::all();
        $categoria = $request->category;
        $services = ServiceService::listByCategory($categoria);
        return view("homeInvitado", ["services"=> $services,'categorias' => $categorias]);
    }

    public function showInicioSesion(){
        return view("inicioSesion"); 
    }

    public function showRegistro(){
        return view("registro"); 
    }
  
    public function crearUsuario(Request $request){
        if($request->has('email')){
            $request->validate([
                'email' => 'required',
                'name' => 'required',
                'password' => 'required' ,
                'phone' => 'required',
              ]);
            $email = $request->input('email');
            $name = $request->input('name');
            $password = $request->input('password');
            $phone = $request->input('phone');
            $user = UserService::new($email, $name, $password, $phone);
            }
        return view("registro");
    }
    
    //Metodos de purchases
    //Crea una compra(Es de prueba)
    public function createPurchase(Request $request){
        if($request->has('description') && $request->has('amount')&& $request->has('account') ){
            $description = $request->input('description');
            $account = $request->input('account');
            $amount = $request->input('amount');
            $user_id = "dario@gmail.com";
            $service_id = 1;
            $purchase = PurchaseService::new($user_id, $service_id,$account, $amount, $description);
        }
        return view("compra"); 
    }

    public function myPurchases(){
        $myPurchases = PurchaseService::listByUser('dario@gmail.com');
        return view("misCompras",['myPurchases' => $myPurchases]); 
    }

    public function deletePurchase(Request $request){
        PurchaseService::delete($id);
        return redirect('misCompras');
   }

    //Fin metodo de purchases

    public function createService(Request $request){
        if($request->has('name')&& $request->has('direccion')&& $request->has('descripcion') && $request->has('categorias') && $request->has('preciomin') && $request->has('preciomax')){
            $description = $request->input('descripcion');
            $name = $request->input('name');
            $direction = $request->input('direccion');
            $category = $request->input('categorias');
            $user = "dario@gmail.com"; //cambiar por sesion 
            $valoration = 0;
            $preciomin = $request->input('preciomin');
            $preciomax = $request->input('preciomax');
            $range_price = "$preciomin-$preciomax";
            ServiceService::new($user,$name,$direction,$valoration,$description,$range_price,$category);
        }
        return view("crearServicio");
    }

    //Administrar categorias 
    public function listCategory(){
        $categorias = CategoryService::all();
        return view("listCategory", ['categorias' => $categorias]);
    }

    public function createCategory(Request $request){
            $name = $request->input('name');
            CategoryService::new($name);
            return redirect('listaCategorias');
    }

    public function modifyCategory(Request $request){
       // dd( $request->category);
        $name = $request->category;
        $newname = $request->input('newname');
        CategoryService::modify($name,$newname);
        return redirect('listaCategorias');
    }

    public function deleteCategory(Request $request){
         $name = $request->category;
         CategoryService::delete($name);
         return redirect('listaCategorias');
    }
    //Fin administrar categorias
}
