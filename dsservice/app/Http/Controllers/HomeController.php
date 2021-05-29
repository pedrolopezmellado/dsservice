<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Service;
use App\Claim;
use App\Purchase;
use App\Repositories\PurchaseRepository;
use App\Services\ClaimService;
use App\Services\ServiceService;
use App\Services\UserService;
use App\Services\PurchaseService;
use App\Services\CategoryService;

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
        if(Auth::user()->role === "admin"){
            $user = Auth::user();
            return view("homeAdministrador", ["user" => $user]);
        }
        $services = ServiceService::paginate(6);
        $categorias = CategoryService::all();
        $user = Auth::user();
        $notificaciones=PurchaseService::countPurchases($user->email);
        $data = $request->all();
        $order = '';
        $category = '';
        return view("homeRegistrado",["notificaciones" => $notificaciones,"user" => $user, "services"=> $services,'categorias' => $categorias,"data"=>$data, 'categoriaBusqueda'=>'Ninguna', 'textoBusqueda'=>'','order'=> $order, 'category' => $category]);
    }

    public function buscadorRegistrado(Request $request){
        $data = $request->all();
        $categorias = CategoryService::all();
        $user = Auth::user();
        $notificaciones=PurchaseService::countPurchases($user->email);
        $categoria = $request->category;
        $textoParaBuscar = $request->buscador;
        $services = ServiceService::searchServices($categoria, $textoParaBuscar);
        $order = $request->order;
        return view("homeRegistrado", ["notificaciones" => $notificaciones,'user'=>$user, "services"=> $services,'categorias' => $categorias,"data"=>$data, 'categoriaBusqueda'=>$categoria, 'textoBusqueda'=>$textoParaBuscar,'order' =>$order,'category' => $categoria]);
    }

    public function ordenarServiciosRegistrado(Request $request){
        //dd($request->input('serviciosParaOrdenar'));
        $data = $request->all();
        $user = Auth::user();
        $categorias = CategoryService::all();
        $categoria = $request->input('categoriaBusqueda');
        $notificaciones=PurchaseService::countPurchases($user->email);
        $textoParaBuscar = $request->input('textoBusqueda');      
        $order = $request->order;
        $services = ServiceService::applyOrder($categoria,$textoParaBuscar, $order);
        return view("homeRegistrado", ["notificaciones" => $notificaciones,'user'=>$user,"services"=> $services,'categorias' => $categorias,"data"=>$data,'categoriaBusqueda'=>$categoria, 'textoBusqueda'=>$textoParaBuscar,'order' =>$order,'category' =>$categoria]);
    }

    public function modifyUser(Request $request)
    {
        $user = Auth::user()->email;
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
            $request->validate([
                'descripcion' => 'required',
                'direccion' => 'required',
                'categorias' => 'required',
                'preciomin' => 'required|numeric',
                'preciomax' => 'required|numeric',
                'name' => 'required',
            ]);
                $description = $request->input('descripcion');
                $name = $request->input('name');
                $direction = $request->input('direccion');
                $category = $request->input('categorias');
                $user = Auth::user()->email; //cambiar por sesion 
                $valoration = 0;
                $preciomin = $request->input('preciomin');
                $preciomax = $request->input('preciomax');
                $range_price = "$preciomin-$preciomax";
                if($request->file('image')!= ""){
                    $archivo = $request->file('image');
                    $imagen = $archivo->getClientOriginalName();
                    $archivo->move('images', $imagen);
                }else{
                    $imagen = "";
                }
                ServiceService::new($user,$name,$direction,$valoration,$description,$range_price,$category,$imagen);
                return redirect("homeRegistrado")->with('mensaje', 'Servicio creado con éxito');
             
        }
        return view("crearServicio",['categorias' => $categorias])->with('mensaje', 'Servicio creado con éxito');
    }

    public function listClaims()
    {
        $user = Auth::user();
        $email = $user->email;
        $disputas = ClaimService::listByUser($email);
        return view("disputas", ["disputas"=> $disputas]);
    }

    public function deleteClaim(Request $request)
    {
        $claim = $request->input('claim_id');
        ClaimService::delete($claim);
        return redirect("disputas")->with('mensaje', 'Disputa borrada correctamente');
    }

    // public function resolveClaim(Request $request){
    //     $resolucion = $_POST['resolucion'];
    //     $disputa = $request->input('disputa');
    //     $comentario = $request->input('comentario');
    //     ClaimService::resolve($resolucion,$disputa, $comentario);
    //     return redirect("listaDisputasPendientes");
    // }

    public function myServices(Request $request)
    {
        $user = Auth::user();
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
            if($request->input('preciomin') != ""){
                $request->validate([
                    'preciomin' => 'numeric',
                ]);
            }
            
            if($request->input('preciomax') != ""){
                $request->validate([
                    'preciomax' => 'numeric',
                ]);
            }
            
            $newname = $request->input('name');
            $newdirection = $request->input('direccion');
            $newcategory = $request->input('categorias');
            $newpreciomin = $request->input('preciomin');
            $newpreciomax = $request->input('preciomax');
            $newrange_price = "$newpreciomin-$newpreciomax";
            ServiceService::modify($service,$newname,$newdirection,$newcategory,$newrange_price);
        }
        return redirect("listaServicios")->with('mensaje', 'Servicio modificado correctamente');
    }

    public function deleteService(Request $request)
    {
        $id = $request->input('name');
        ServiceService::delete($id);
        return redirect('listaServicios')->with('mensaje', 'Servicio eliminado correctamente');
    }

    

    public function myPurchases(Request $request){
        $user = Auth::user();
        $email = $user->email;
        $myPurchases = PurchaseService::listByUser($email);
        $data = $request->all();
        //dd($data);
        $order = '';
        $tipo = '';
        return view("misCompras",compact('myPurchases','data','order','tipo'));
    }

    public function tipoPurchases(Request $request){
        $user = Auth::user();
        $email = $user->email;
        $tipo = $request->tipo;
        $myPurchases = PurchaseService::tipoPurchases($email, $tipo);
        $order = '';
        $data = $request->all();
        //dd($data);

        return view("misCompras",compact('myPurchases','data','order','tipo'));
    }
/*
    public function ordenarPurchases(Request $request){
        $user = Auth::user();
        $email = $user->email;
        $order = $request->order;
        $myPurchases = PurchaseService::ordenar($email, $order);
        $data = $request->all();
        $tipo = '';
        return view("misCompras",compact('myPurchases','data','order','tipo'));
    }
*/
    public function deletePurchase(Request $request)
    {
        //dd( $request->get('name'));
        $id = $request->input('name');
        //dd($request->all());
        PurchaseService::delete($id);
        return redirect('myPurchases')->with('mensaje', 'Servicio Adquirido borrado correctamente');
    }

    public function showMyPurchasesInProcess(){
        $user = Auth::user()->email;
        $purchases = PurchaseService::purchasesInProcess($user);
        //dd($purchases);
        return view("comprasSolicitadas", ["purchases" => $purchases]);
    }

    public function showAcceptPurchase($purchase)
    {
        $purchase = PurchaseService::findPurchase($purchase);
        //dd($purchase);
        return view("aceptarCompra", ["purchase" => $purchase]);
    }

    public function acceptPurchase(Request $request){
        $resolucion = $_POST['resolucion'];
        $purchase = $request->input('purchase');
        PurchaseService::resolve($resolucion,$purchase);
        return redirect("comprasSolicitadas")->with('mensaje', 'Compra resuelta correctamente');
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
        return redirect("myPurchases")->with('mensajeDisputa', 'Disputa creada correctamente');
    }

    public function verPurchase(Request $request,$compra)
    {
        //dd($compra);
        $purchase = PurchaseService::find($compra);
        $id = $purchase->service_id;
        $total = PurchaseService::getValues($id);
        if($total != null)
            ServiceService::newvalor($total,$id);
        else
            $total = 0;
        //dd($total);
        return view("verCompra", ["purchase" => $purchase,"valoracion" => $total]);
    }

    public function changeValoration(Request $request)
    {
        //dd($compra);
        $newvaloracion = $request->input('valor');
        $id = $request->input('ident');
        // dd($newvaloracion);
        PurchaseService::valor($newvaloracion,$id);

        return redirect("detailedPurchase/{$id}");
    }

    public function changeComentario(Request $request)
    {
        //dd($compra);
        $comentario = $request->input('comentario');
        $id = $request->input('ident');
        //dd($request->all());

        PurchaseService::comentario($comentario,$id);
        return redirect("detailedPurchase/{$id}");
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
            $user = Auth::user();
            $email = $user->email;
            $service_id = $request->input('servicio');
            //dd($service_id);
            $purchase = PurchaseService::new($email, $service_id,$account, $amount, $description);
        }
        return redirect("homeRegistrado"); 
    }
}
