<?php
namespace App\Http\Controllers;
use JWTAuth;
use Illuminate\Http\Request;
use App\Models\UserPelada;
use DB;

class UserPeladaController extends Controller
{
    protected function listEnvite()
    {        
        session_start();

        $objec = DB::select("SELECT p.*, up.id up_id
                                FROM peladas p 
                             INNER JOIN user_peladas up 
                                ON up.pelada_id=p.id 
                             INNER JOIN users u 
                                ON u.id=up.user_id 
                             WHERE up.user_id = ".$_SESSION["usuario_id"]." AND up.`status`='N' 
                                AND up.ativo = 'S'");
        return view('Peladas.listEnvite',compact('objec'));
    }

    protected function acceptEnvite(Request $request)
    {   
        session_start();     
        UserPelada::where('id', $request->id)->update(['status' => 'S']);
            return redirect()
              ->action('UserPeladaController@listEnvite',['token'=>$_SESSION["token"]]);
    }

    protected function deleteEnvite(Request $request)
    {    session_start();     
        UserPelada::where('id', $request->id)->update(['ativo' => 'N']);
            return redirect()
              ->action('UserPeladaController@listEnvite',['token'=>$_SESSION["token"]]);
    }

    protected function envite()
    {        
        session_start();
        $objec = DB::select("SELECT u.* 
                                FROM users u
                             WHERE u.id 
                                NOT IN  (SELECT u.id 
                                            FROM users u 
                                            left JOIN user_peladas up
                                                ON u.id = up.user_id 
                                         WHERE up.pelada_id = ".$_SESSION["pelada_id"]." AND up.status = 'N' 
                                ) AND u.id <> ".$_SESSION["usuario_id"]."");

            return view('Users.list',compact('objec'));
    }


    protected function sendEnvite(Request $request)
    {       
        session_start();
 
        if($request->id){
        $_SESSION["user_id"]=$request->id;            
        }
        $user = UserPelada::create([
            'user_id' => $_SESSION["user_id"],
            'pelada_id' => $_SESSION["pelada_id"] ,
            'status' => 'N',
        ]);        

        return redirect()
                ->action('UserPeladaController@envite',['token'=>$_SESSION["token"]]);
    }

    protected function associate(Request $request)
    {        
        session_start();
        
        $user = UserPelada::create([
            'user_id' => $_SESSION["usuario_id"],
            'pelada_id' => $request->get('id'),
            'status' => 'S',
        ]);        

       return redirect()
       ->action('PeladaController@listEvent',['token'=>$_SESSION["token"]]);
    }

    protected function envited()
    {        
        session_start();
        $user = UserPelada::create([
            'user_id' => $_SESSION["usuario_id"],
            'pelada_id' => $request->get('id'),
            'status' => 'N',
        ]);        

       return redirect()
       ->action('PeladaController@listEvent',['token'=>$_SESSION["token"]]);  
    }
}
