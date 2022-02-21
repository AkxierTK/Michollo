<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Chollo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function crearChollo(){
        $categorias=Categoria::all();
        return view("chollos.crear",compact('categorias'));
    }


    public function insertChollo(Request $request){
        $request->validate([
            'titulo' => 'required',
            'categorias'=>'required'
        ]);
        $categorias= $request->categorias;
        $nuevoChollo= new Chollo();
        $nuevoChollo->titulo=$request->titulo;
        $nuevoChollo->user_id=Auth::id(); 
        $nuevoChollo->save();
        $nuevoChollo->attachCategorias($categorias);
        $chollos=Chollo::with("user")->get();
        return view('chollos.cargar',compact('chollos'))->with('mensaje',"chollo creado");
    }

    public function updateChollo(Request $request){
        $request->validate([
            'titulo' => 'required',
            'categorias'=>'required',
            'id'=>'required'
        ]);
        $categorias= $request->categorias;
        $nuevoChollo=Chollo::findOrFail($request->id);
        $nuevoChollo->titulo=$request->titulo;
        $nuevoChollo->user_id=Auth::id(); 
        $nuevoChollo->save();
        $nuevoChollo->detachCategorias(Categoria::all());
        $nuevoChollo->attachCategorias($categorias);
        $chollos=Chollo::with("user")->get();
        return view('chollos.cargar',compact('chollos'))->with('mensaje',"chollo creado");
    }

    public function editarChollo($id){
        $chollo=Chollo::findOrFail($id);
        $categorias=Categoria::all();
        return view("chollos.editar",compact('chollo','categorias'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   $chollos=Chollo::with('user')->get();
        return view('chollos.cargar',compact('chollos'));
    }
}
