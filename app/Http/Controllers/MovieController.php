<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Type_Users;
use App\Permisos;
use App\Movie;
use App\Categories;
use App\Type_Movie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Image;
class MovieController extends Controller
{
   public function index(Request $request){
    $movie= Movie::all();    
    return view('movie/index',['movie'=>$movie]);
   }
   public function create(){
    $categoria= Categories::where('estado','1')->get();    
    $tipo= Type_Movie::where('estado','1')->get();
    return view('movie/create',['categoria'=>$categoria,'tipo'=>$tipo]);
   }
   public function store(Request $request){
    $ip_cliente = $_SERVER["REMOTE_ADDR"];
    $idusuario  = Auth::user()->id;
    $input=[
        'nombre'=>$request['name'],
        'descripcion'=>$request['descripcion'], 
        'estado'=>$request['estado'],
        'id_categoria'=>$request['id_categoria'],
        'id_tipo'=>$request['id_tipo'],
        'calificacion'=>$request['calificacion'],
        'id_usuariocrea'=>$idusuario,
        'id_usuariomod'=>$idusuario,
    ];
    Movie::create($input);
    return redirect()->route('movie')->withStatus(__('Se ha creado correctamente.'));
   }
   public function edit($id){
        $movie= Movie::where('id',$id)->first();
        return view('permisos/edit',['movie'=>$movie]);
   }
   public function update($id){
        $ip_cliente = $_SERVER["REMOTE_ADDR"];
        $idusuario  = Auth::user()->id;
        $input=[
            'nombre'=>$request['name'],
            'descripcion'=>$request['descripcion'], 
            'estado'=>$request['estado'],
        ];
        $movie= Movie::where('id',$id)->first();
        $movie->update($input);
   }
}
