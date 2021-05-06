<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;
use App\Service;
use App\Claim;
use App\Services\ClaimService;
use App\Services\ServiceService;
use App\Services\UserService;
use App\Services\PurchaseService;
use App\Services\CategoryService;
use Auth;

class WebController extends Controller
{
    public function showHome(Request $request){
        $services = ServiceService::paginate(6);
        $categorias = CategoryService::all();
        $data = $request->all();
        
        return view("homeInvitado", ["services"=> $services,'categorias' => $categorias,"data"=>$data, 'categoriaBusqueda'=>'Ninguna', 'textoBusqueda'=>'']);
    }

    public function showHomeAdmin(){
        return view("homeAdministrador");
    }

    public function deleteUser(Request $request){
        //dd($request->input('user_id'));
        $user = $request->input('user_id');
        UserService::delete($user);
        return redirect("listaUsuarios");
    }

    public function buscador(Request $request){
        $data = $request->all();
        $categorias = CategoryService::all();
        $categoria = $request->category;
        $textoParaBuscar = $request->buscador;
        $services = ServiceService::searchServices($categoria, $textoParaBuscar);
        return view("homeInvitado", ["services"=> $services,'categorias' => $categorias,"data"=>$data, 'categoriaBusqueda'=>$categoria, 'textoBusqueda'=>$textoParaBuscar]);
    }

    public function ordenarServicios(Request $request){
        //dd($request->input('serviciosParaOrdenar'));
        $data = $request->all();
        //dd($data);
        $categorias = CategoryService::all();
        $categoria = $request->input('categoriaBusqueda');
        $textoParaBuscar = $request->input('textoBusqueda');
      
        $orden = $request->order;
        $services = ServiceService::applyOrder($categoria,$textoParaBuscar, $orden);
        return view("homeInvitado", ["services"=> $services,'categorias' => $categorias,"data"=>$data,'categoriaBusqueda'=>$categoria, 'textoBusqueda'=>$textoParaBuscar]);
    }

    public function listarUsuarios(){
        $users = UserService::paginate();
        return view("listaUsuarios", ["users"=> $users]);
    }


    public function showInicioSesion(Request $request){
        $services = ServiceService::paginate(6);
        $categorias = CategoryService::all();
        $data = $request->all();
        return view("homeRegistrado"); 
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
        return redirect('home');
            //return view("registro");
    }

    public function verService(Request $request,$service){
        //dd($compra);
        $servicio = ServiceService::find($service);
        //dd($service);
        return view("verServicio", ["service" => $servicio]);
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
    public function iniciarSesion(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3'
            ]);

        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );

        $credentials = request()->only('email', 'password');
        if(Auth::attempt($credentials))
        {
            return 'registrado ya';
        }
        return 'no estoy registrado';

         
    }

    public function eliminarUsuario(Request $request){
        return 'hola que tal';
    }

    public function showHomeRegistrado(Request $request){
        $services = ServiceService::paginate(6);
        $categorias = CategoryService::all();
        $user = User::currentUser();
        $data = $request->all();
        return view("homeRegistrado",["user" => $user, "services"=> $services,'categorias' => $categorias,"data"=>$data, 'categoriaBusqueda'=>'Ninguna', 'textoBusqueda'=>'']);
    }

}
