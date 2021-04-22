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
   /**public function currentUser(){
        return User::find("dario@gmail.com");
    }  */ 

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

    public function showHome(Request $request){
        $services = ServiceService::paginate(6);
        $categorias = CategoryService::all();
        $data = $request->all();
        
        return view("homeInvitado", ["services"=> $services,'categorias' => $categorias,"data"=>$data, 'categoriaBusqueda'=>'Ninguna', 'textoBusqueda'=>'']);
    }

    public function deleteUser(Request $request){
        //dd($request->input('user_id'));
        $user = $request->input('user_id');
        UserService::delete($user);
        return redirect("homeAdministrador");
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
        $users = UserService::all();
        return view("homeAdministrador", ["users"=> $users]);
    }


    public function showInicioSesion(){
        return view("inicioSesion"); 
    }

    public function showRegistro(){
        return view("registro"); 
    }

    public function showEditarServicio(){
        $categorias = CategoryService::all();
        return view("editarServicio", ["categorias" => $categorias]);
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
    
    //Metodos de purchases
    //Crea una compra(Es de prueba)
    public function createPurchase(Request $request){
        if($request->has('description') && $request->has('amount')&& $request->has('account') ){
            $description = $request->input('description');
            $account = $request->input('account');
            $amount = $request->input('amount');
            $user = UserService::currentUser();
            $email = $user->email;
            $service_id = 1;
            $purchase = PurchaseService::new($email, $service_id,$account, $amount, $description);
        }
        return view("compra"); 
    }

    public function myPurchases(){
        $user = UserService::currentUser();
        $email = $user->email;
        $myPurchases = PurchaseService::listByUser($email);

        return view("misCompras",['myPurchases' => $myPurchases]); 
    }

    public function deletePurchase(Request $request){
        //dd( $request->get('name'));
        $id = $request->input('name');
        PurchaseService::delete($id);
        return redirect('myPurchases');
   }

    //Fin metodo de purchases

    //CRUD de Services
    public function createService(Request $request){
        $categorias = CategoryService::all();
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
        return view("crearServicio",['categorias' => $categorias]);
    }

    public function modifyService(Request $request){
        $service = 1;
        if($request->has('name')&& $request->has('direccion')&& $request->has('descripcion') && $request->has('categorias') && $request->has('preciomin') && $request->has('preciomax')){
            $newname = $request->input('name');
            $newdirection = $request->input('direccion');
            $newcategory = $request->input('categorias');
            $newpreciomin = $request->input('preciomin');
            $newpreciomax = $request->input('preciomax');
            $newrange_price = "$newpreciomin-$newpreciomax";
            ServiceService::modify($service,$newname,$newdirection,$newcategory,$newrange_price);
        }
        return redirect("home");
    }

    public function listClaims(){
        $disputas = Claim::paginate(4);
        return view("disputas", ["disputas"=> $disputas]);
    }

    public function deleteClaim(Request $request){
        $claim = $request->input('claim_id');
        ClaimService::delete($claim);
        return redirect("disputas");
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

    public function showHomeRegistrado(){
        return view("homeRegistrado");
    }

}
