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

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $services = ServiceService::paginate(6);
        $categorias = CategoryService::all();
        $user = User::currentUser();
        $data = $request->all();
        return view("homeRegistrado",["user" => $user, "services"=> $services,'categorias' => $categorias,"data"=>$data, 'categoriaBusqueda'=>'Ninguna', 'textoBusqueda'=>'']);
    }

    public function buscadorRegistrado(Request $request)
    {
        $data = $request->all();
        $categorias = CategoryService::all();
        $user = User::currentUser();
        $categoria = $request->category;
        $textoParaBuscar = $request->buscador;
        $services = ServiceService::searchServices($categoria, $textoParaBuscar);
        return view("homeRegistrado", ['user'=>$user, "services"=> $services,'categorias' => $categorias,"data"=>$data, 'categoriaBusqueda'=>$categoria, 'textoBusqueda'=>$textoParaBuscar]);
    }

    public function ordenarServiciosRegistrado(Request $request)
    {
        //dd($request->input('serviciosParaOrdenar'));
        $data = $request->all();
        $user = User::currentUser();
        $categorias = CategoryService::all();
        $categoria = $request->input('categoriaBusqueda');
        $textoParaBuscar = $request->input('textoBusqueda');
      
        $orden = $request->order;
        $services = ServiceService::applyOrder($categoria,$textoParaBuscar, $orden);
        return view("homeRegistrado", ['user'=>$user,"services"=> $services,'categorias' => $categorias,"data"=>$data,'categoriaBusqueda'=>$categoria, 'textoBusqueda'=>$textoParaBuscar]);
    }

    public function modifyUser(Request $request)
    {
        $user = User::currentUser()->email;
        if($request->has('name')&& $request->has('telefono')){
            $newname = $request->input('name');
            $newphone = $request->input('telefono');
            UserService::modify($user,$newname,$newphone);
        }
        return redirect("homeRegistrado");
    }

    public function createService(Request $request)
    {
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

    public function listClaims()
    {
        $disputas = Claim::paginate(4);
        return view("disputas", ["disputas"=> $disputas]);
    }

    public function deleteClaim(Request $request)
    {
        $claim = $request->input('claim_id');
        ClaimService::delete($claim);
        return redirect("disputas");
    }

    public function myServices(Request $request)
    {
        $user = User::currentUser();
        $email = $user->email;
        $services = ServiceService::listByUser($email);
        $data = $request->all();
        return view("listaServicios",['services' => $services,'data' => $data]);
    }

    public function showEditarServicio($service)
    {
        $servicio = ServiceService::find($service);
        $categorias = CategoryService::all();
        return view("editarServicio", ["service" => $servicio, "categorias" => $categorias]);
    }

    public function modifyService(Request $request)
    {
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

    public function deleteService(Request $request)
    {
        $id = $request->input('name');
        ServiceService::delete($id);
        return redirect('listaServicios');
    }

    public function myPurchases(Request $request)
    {
        $user = User::currentUser();
        $email = $user->email;
        $myPurchases = PurchaseService::listByUser($email);
        $data = $request->all();

        return view("misCompras",compact('myPurchases','data'));
    }

    public function tipoPurchases(Request $request)
    {
        $user = User::currentUser();
        $email = $user->email;
        $orden = $request->tipo;
        $myPurchases = PurchaseService::tipoPurchases($email, $orden);
        //dd($myPurchases);

        $data = $request->all();
        return view("misCompras",compact('myPurchases','data'));
    }

    public function ordenarPurchases(Request $request)
    {
        $user = User::currentUser();
        $email = $user->email;
        $orden = $request->order;
        $myPurchases = PurchaseService::ordenar($email, $orden);
        
        $data = $request->all();
        return view("misCompras",compact('myPurchases','data'));
    }

    public function deletePurchase(Request $request)
    {
        //dd( $request->get('name'));
        $id = $request->input('name');
        //dd($request->all());
        PurchaseService::delete($id);
        return redirect('myPurchases');
    }

    public function abrirDisputa(Request $request)
    {
        //dd($compra);
        $purchase = PurchaseService::find($request->input('purchase'));
        //dd($request->all());
        return view("abrirDisputa", ["purchase" => $purchase] ); 
    }

    public function crearDisputa(Request $request)
    {
        if($request->has('motive')){
            $motive = $request->input('motive');
            $purchase = $request->input('purchase');
            $claim = ClaimService::new($motive, $purchase);
        }
        return redirect("myPurchases"); 
    }

    public function verPurchase(Request $request,$compra)
    {
        //dd($compra);
        $purchase = PurchaseService::find($compra);
        $valoracion = $purchase->service->valoration;
        return view("verCompra", ["purchase" => $purchase,"valoracion" => $valoracion]);
    }

    public function changeValoration(Request $request)
    {
        //dd($compra);
        $newvaloracion = $request->input('valor');
        $id = $request->input('ident');
        // dd($newvaloracion);

        PurchaseService::valor($newvaloracion,$id);
        return redirect('myPurchases');
    }

    public function realizarCompra(Request $request)
    {
        $service = ServiceService::find($request->input('servicio'));
        return view("compra", ["service" => $service] ); 
    }

    public function createPurchase(Request $request)
    {
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
}
