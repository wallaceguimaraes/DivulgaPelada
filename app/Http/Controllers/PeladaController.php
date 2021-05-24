<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelada;
use DB;

class PeladaController extends Controller
{
    //    
    public function create(){ 
        return view('Peladas.create');
    }

    public function register(Request $request){
        $data = date("Y-d-m", strtotime($request->get('date')));
        session_start();
        $user = Pelada::create([
            'event_name' =>$request->get('event_name'),
            'date' => $data,
            'hours' => $request->get('hour'),
            'local' => $request->get('local'),
            'creator' => $_SESSION["usuario_id"],
        ]);        
        return redirect()
           ->action('PeladaController@listEvent',['token'=>$_SESSION["token"]]);

    }

    public function  registerNew(Request $request){
        session_start();
        return redirect()
        ->action('PeladaController@register',['token'=>$_SESSION["token"]]);
    }

    public function new(){
       session_start();
        return redirect()
        ->action('PeladaController@create',['token'=>$_SESSION["token"]]);
    }

public function listEvent(){
    session_start();
    $objec = DB::select("SELECT p.* 
                            FROM peladas p 
                         WHERE p.id 
                         NOT IN( SELECT p.id 
                                    FROM peladas p 
                                INNER JOIN user_peladas up 
                                    ON up.pelada_id=p.id 
                                INNER JOIN users u 
                                    ON up.user_id=u.id 
                                WHERE u.id =".$_SESSION["usuario_id"].")");
            return view('menu',compact('objec')); 
}

public function selecionaConv(){
    session_start();
    $objec = DB::select("SELECT p.* 
                            FROM peladas p 
                        WHERE p.creator=".$_SESSION["usuario_id"]."" );

    return view('Peladas.list',compact('objec'));
}
 
public function buscaPelada(Request $request){
    $event = $request->event;
    if($event!==""){
        $filtro = "and event_name like '%".$event."%'";
    }
   
   $objec = DB::select("SELECT * 
                            FROM peladas p 
                        WHERE p.id 
                            NOT IN( SELECT p.id 
                                        FROM peladas p 
                                    INNER JOIN user_peladas up 
                                        ON up.pelada_id=p.id 
                                    INNER JOIN users u 
                                        ON up.user_id=u.id) ".$filtro."");

        return view('menu',compact('objec'));
}

}