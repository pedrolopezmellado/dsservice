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
        $order = '';
        $category = '';
        return view("homeInvitado", ["services"=> $services,'categorias' => $categorias,"data"=>$data, 'categoriaBusqueda'=>'Ninguna', 'textoBusqueda'=>'','order' =>$order,'category' => $category]);
    }

    public function showHomeAdmin(){
        return view("homeAdministrador");
    }

    public function deleteUser(Request $request){
        //dd($request->input('user_id'));
        $user = $request->input('user_id');
        UserService::delete($user);
        return redirect("listaUsuarios")->with('mensaje', 'Usuario eliminado correctamente');
    }

    public function buscador(Request $request){
        $data = $request->all();
        $categorias = CategoryService::all();
        $categoria = $request->category;
        $textoParaBuscar = $request->buscador;
        $services = ServiceService::searchServices($categoria, $textoParaBuscar);
        $order = $request->order;
        //dd($data);
        return view("homeInvitado", ["services"=> $services,'categorias' => $categorias,"data"=>$data, 'categoriaBusqueda'=>$categoria, 'textoBusqueda'=>$textoParaBuscar,'order' =>$order,'category' => $categoria]);
    }


    public function buscadorRegistrado(Request $request){
        $data = $request->all();
        $categorias = CategoryService::all();
        $user = User::currentUser();
        $categoria = $request->category;
        $textoParaBuscar = $request->buscador;
        $services = ServiceService::searchServices($categoria, $textoParaBuscar);
        $order = $request->order;
        return view("homeRegistrado", ['user'=>$user, "services"=> $services,'categorias' => $categorias,"data"=>$data, 'categoriaBusqueda'=>$categoria, 'textoBusqueda'=>$textoParaBuscar,'order' =>$order,'category' => $categoria]);
    }


    public function ordenarServicios(Request $request){
        //dd($request->input('serviciosParaOrdenar'));
        $data = $request->all();
        //dd($data);
        $categorias = CategoryService::all();
        $categoria = $request->input('categoriaBusqueda');
        $textoParaBuscar = $request->input('textoBusqueda');
      
        $order = $request->order;
        $services = ServiceService::applyOrder($categoria,$textoParaBuscar, $order);
        return view("homeInvitado", ["services"=> $services,'categorias' => $categorias,"data"=>$data,'categoriaBusqueda'=>$categoria, 'textoBusqueda'=>$textoParaBuscar,'order' =>$order,'category' =>$categoria]);
    }


    public function ordenarServiciosRegistrado(Request $request){
        //dd($request->input('serviciosParaOrdenar'));
        $data = $request->all();
        $user = User::currentUser();
        $categorias = CategoryService::all();
        $categoria = $request->input('categoriaBusqueda');
        $textoParaBuscar = $request->input('textoBusqueda');
      
        $order = $request->order;
        $services = ServiceService::applyOrder($categoria,$textoParaBuscar, $order);
        return view("homeRegistrado", ['user'=>$user,"services"=> $services,'categorias' => $categorias,"data"=>$data,'categoriaBusqueda'=>$categoria, 'textoBusqueda'=>$textoParaBuscar,'order' =>$order,'category' =>$categoria]);
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
            $archivo = $request->file('image');
            $imagen = $archivo->getClientOriginalName();
            $archivo->move('images', $imagen);
            $user = UserService::new($email, $name, $password, $phone, $imagen);
            }
        return redirect('home');
            //return view("registro");
    }

    
    //Metodos de purchases
    //Crea una compra(Es de prueba)
    public function realizarCompra(Request $request){
        $service = ServiceService::find($request->input('servicio'));
        return view("compra", ["service" => $service] ); 
    }

    public function createPurchase(Request $request){
        if($request->has('description') && $request->has('amount')&& $request->has('account') ){
            $description = $request->input('description');
            $account = $request->input('account');
            $amount = $request->input('amount');
            $user = User::currentUser();
            $email = $user->email;
            $service_id = $request->input('servicio');
            //dd($service_id);
            $purchase = PurchaseService::new($email, $service_id,$account, $amount, $description);
        }
        return redirect("homeRegistrado"); 
    }

    public function myPurchases(Request $request){
        $user = User::currentUser();
        $email = $user->email;
        $myPurchases = PurchaseService::listByUser($email);
        $data = $request->all();
        //dd($data);
        $order = '';
        $tipo = '';
        return view("misCompras",compact('myPurchases','data','order','tipo'));
    }
/*
    public function ordenarPurchases(Request $request){
        $user = User::currentUser();
        $email = $user->email;
        $order = $request->order;
        $myPurchases = PurchaseService::ordenar($email, $order);
        $data = $request->all();
        $tipo = '';
        return view("misCompras",compact('myPurchases','data','order','tipo'));
    }
*/
    public function tipoPurchases(Request $request){
        $user = User::currentUser();
        $email = $user->email;
        $tipo = $request->tipo;
        $myPurchases = PurchaseService::tipoPurchases($email, $tipo);
        $order = '';
        $data = $request->all();
        //dd($data);

        return view("misCompras",compact('myPurchases','data','order','tipo'));
    }

    public function deletePurchase(Request $request){
        //dd( $request->get('name'));
        $id = $request->input('name');
        //dd($request->all());
        PurchaseService::delete($id);
        return redirect('myPurchases');
   }

   public function verPurchase(Request $request,$compra){
    //dd($compra);
    $purchase = PurchaseService::find($compra);
    $valoracion = $purchase->service->valoration;
    return view("verCompra", ["purchase" => $purchase,"valoracion" => $valoracion]);
    }


    public function changeValoration(Request $request){
        //dd($compra);
        $newvaloracion = $request->input('valor');
        $id = $request->input('ident');
       // dd($newvaloracion);

        PurchaseService::valor($newvaloracion,$id);
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
            $archivo = $request->file('image');
            $imagen = $archivo->getClientOriginalName();
            $archivo->move('images', $imagen);
            ServiceService::new($user,$name,$direction,$valoration,$description,$range_price,$category,$imagen);
        }
        return view("crearServicio",['categorias' => $categorias]);
    }

    public function modifyService(Request $request){
        $service = $request->input('id');
        if($request->has('name')&& $request->has('direccion')&& $request->has('descripcion') && $request->has('categorias') && $request->has('preciomin') && $request->has('preciomax')){
            $newname = $request->input('name');
            $newdirection = $request->input('direccion');
            $newcategory = $request->input('categorias');
            $newpreciomin = $request->input('preciomin');
            $newpreciomax = $request->input('preciomax');
            $newrange_price = "$newpreciomin-$newpreciomax";
            ServiceService::modify($service,$newname,$newdirection,$newcategory,$newrange_price);
        }
        return redirect("listaServicios");
    }

    public function deleteService(Request $request){
        $id = $request->input('name');
        ServiceService::delete($id);
        return redirect('listaServicios');
    }

    public function verService(Request $request,$service){
        //dd($compra);
        $servicio = ServiceService::find($service);
        $total = PurchaseService::getValues($servicio->id);
        if($total != null)
            ServiceService::newvalor($total,$servicio->id);
        else
            $total = 0;
        
        $comentarios = PurchaseService::getComentarios($servicio->id);

        return view("verServicio", ["service" => $servicio,"valoracion" => $total,"comentarios" => $comentarios]);
    }

    //Administrar categorias 
    public function listCategory(){
        $categorias = CategoryService::all();
        return view("listCategory", ['categorias' => $categorias]);
    }

    public function createCategory(Request $request){
            $name = $request->input('name');
            CategoryService::new($name);
            return redirect('listaCategorias')->with('mensajeCrear', 'Categoria creada correctamente');
    }

    public function modifyCategory(Request $request){
       // dd( $request->category);
        $name = $request->category;
        $newname = $request->input('newname');
        CategoryService::modify($name,$newname);
        return redirect('listaCategorias')->with('mensajeModificar', 'Categoria modificada correctamente');
    }

    public function deleteCategory(Request $request){
         $name = $request->category;
         if($name != "Ninguna"){
         CategoryService::cambiarASinCAtegoria($name);
         //CategoryService::delete($name);
         }
         return redirect('listaCategorias')->with('mensajeEliminar', 'Categoria eliminada correctamente');
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
        $order = '';
        $category = '';
        return view("homeRegistrado",["user" => $user, "services"=> $services,'categorias' => $categorias,"data"=>$data, 'categoriaBusqueda'=>'Ninguna', 'textoBusqueda'=>'','order'=> $order, 'category' => $category]);
    }

}
