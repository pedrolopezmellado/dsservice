<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Services\ClaimService;
use App\Services\ServiceService;


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

}
