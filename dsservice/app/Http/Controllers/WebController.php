<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Services\ClaimService;
use App\Services\ServiceService;
use App\Services\UserService;
use App\Services\PurchaseService;

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
        return view("homeInvitado", ["services"=> $services]);
    }

    public function buscador(Request $request){
        $categoria = $request->input('categorias');
        $services = ServiceService::listByCategory($categoria);
        return view("homeInvitado", ["services"=> $services]);
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
    
    //Crea una compra(Falta redirigir bien el servicio del que viene e identificar al usuario)
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

}
