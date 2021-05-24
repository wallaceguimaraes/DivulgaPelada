<?php


namespace App\Http\Controllers;
use JWTAuth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization");


class DataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function loginOut(){
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
         if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
            /*
            return redirect()
            ->action('DataController@loginOut')        
            ->with('mensagem', 'Usuário ou senha incorretos');
            */
        }

        session_start();
        $_SESSION["token"] = $token;
        $_SESSION["usuario_id"] = JWTAuth::user()->id;

       // var_dump($_SESSION["usuario_id"]);
        
        return $this->respondWithToken($token);

    }

 
 
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth('api')->user());
    }
 
 
    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        JWTauth::logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
 
 
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }
 

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return redirect()
        ->action('PeladaController@listEvent',['token'=>$_SESSION["token"]]);
    /*
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ]);*/

    }

}
 