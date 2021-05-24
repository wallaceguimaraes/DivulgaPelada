<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pelada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
//use App\Models\User;

class UserController extends Controller
{
    public function create(){
            return view('Users.create');
    }    
    
    public function store(Request $request){
        User::create([
                'name'=>$request->name,
                'surname'=>$request->surname,
                'email'=>$request->email,
                'password'=>$request->password,
        ]);
        return 'O seu cadastro foi concluído com sucesso!';
        }    

        public function login(){
                return view('login');
        }

        public function loading(){
                return redirect()
                ->action('UserController@authenticate')        
                ->with('mensagem', 'Carregando...');
        }     

   public function openMenu(){
        session_start();
        return redirect()
           ->action('PeladaController@listEvent',['token'=>$_SESSION["token"]]);
   }

   public function openMen(){
        session_start();
        return redirect()
        ->action('PeladaController@listEvent',['token'=>$_SESSION["token"]]);
  }

   public function assoc(){
           return $this->belongsToMany(Pelada::class,'user_peladas','user_id','pelada_id');
   }

    public function register(Request $request)
    {
            $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $token = JWTAuth::fromUser($user);
        return view('login');
    }

    public function displayUsers(Request $request){
        session_start();
        $_SESSION["pelada_id"]=$request->id;
        return redirect()
        ->action('UserPeladaController@envite',['token'=>$_SESSION["token"]]);        
    }

}