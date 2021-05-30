<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    // protected function redirectTo(){
    //     return redirect('homeRegistrado')->with('mensaje', 'Usuario creado correctamente');
    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'max:6']    
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $request = request();
        $u = new User();
        $u->email = $data['email'];
        $u->name = $data['name'];
        $u->password = Hash::make($data['password']);
        $u->phone = $data['phone'];
        if($request->file('image') != ""){
            $file_extention = $data['image']->getClientOriginalExtension();
            $file_name = time().rand(99,999).'image_profile.'.$file_extention;
            $file_path = $data['image']->move('images',$file_name);
            $u->photo = $file_path;
        }
        // $archivo = $request->file('image');
        // $imagen = $archivo->getClientOriginalName();
        // $archivo->move('images', $imagen);
        $u->save();
        return $u;

        /*return User::create([
            'email' => $data['email'],
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
        ]);*/
    }
}
