<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth as FacadesJWTAuth;
use Tymon\JWTAuth\JWTAuth as JWTAuthJWTAuth;

class UserController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (!$token = FacadesJWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        if($token){
            return response()->json([
                'success' => true,
                'token' => $token,
                'user' => User::where('email',$credentials['email'])->get()->first()
            ],200);
        }
        else{
            return response()->json([
                'success' => false,
                'message' => "Wrong credentials"
            ],401);
    
        }


        // return response()->json(compact('token'));
        
        // $response = compact('token');
        // $response['user'] = Auth::user();
        // return $response;
    }
    // public function getAuthenticatedUser()
    // {
    //     try {
    //         if (!$user = FacadesJWTAuth::parseToken()->authenticate()) {
    //             return response()->json(['user_not_found'], 404);
    //         }
    //     } catch (JWTException $e) {
    //         return response()->json(['error' => 'could_not_create_token'], 500);
    //     }
    //     return response()->json(compact('user'));
    // }
    public function index()
    {


        // if(request()->has('empty')){
        // 	$users = [];
        // }else{
        // 	$users = [
        // 		'Joel',
        // 		'Ellie',
        // 		'Test',
        // 		'Tommy',
        // 		'Bill',
        // 	];
        // }

        //$users = DB::table('users')->get();
        $users = User::all();
        //dd($users);
        $titulo = 'Listado de usuarios';
        // return view("users",[
        // 	'llave1' => $users,
        // 	'titulo' => 'Listado de usuarios'
        // ]);

        // return view("users")->with([
        // 	'llave1' => $users,
        // 	'titulo' => 'Listado de usuarios'
        // ]);

        // return view("users")
        // ->with('llave1', $users)
        // ->with('titulo', 'Listado de usuarios');

        return view("usuarios.index")
            ->with('users', $users)
            ->with('titulo', 'Listado de usuarios');


        //compact convierte las variables en un arreglo asociativo
        //return view('users.index',compact('titulo','users'));

    }

    public function show(User $user)
    {
        return view('usuarios.show', compact('user'));
    }

    // public function show($id){
    //     $user = User::findOrFail($id);
    //     // if($user == null){
    //     //     //return response()->view('errors.404', [] ,404);
    //     //     return view('errors.404');
    //     // }
    //     return view('users.show',compact('user'));
    // 	//return "Mostrando detalle del usuario: {$id}";
    // }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store()
    {
        //$data = request()->all();
        //return redirect("/usuarios/nuevo")->withInput(); //redirige al mismo formulario para crear usuario pero manteniendo los campos ingresados en los text
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'min:3'
        ], [
            'name.required' => 'El nombre es obligatorio'
        ]);

        //$data = request()->only(['name','email','password']);
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        //return redirect('usuarios');
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('usuarios.edit', ['user' => $user]);
    }

    public function update(User $user)
    {
        //dd('hola');
        //$data->update(request()->all());
        // $data = request()->validate([
        //     'name'=>'required',
        //     'email'=>'required|email|unique:users,email,'.$user->id,  //excluye el propio email
        //     'password'=>'',
        // ]);

        $data = request()->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],  //excluye el propio email
            'password' => '',
        ]);

        if ($data['password'] != null) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']); //quito ese indice del arreglo
        }

        //$data['password'] = bcrypt($data['password']);
        $user->update($data);
        //return redirect("usuarios/{$user->id");
        return redirect()->route('users.show', ['user' => $user]);
    }

    function destroy(User $user)
    {
        $user->delete(); //averiguar como eliminar de forma logica
        return redirect()->route('users.index');
    }
}
