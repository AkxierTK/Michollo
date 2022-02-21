<?php

namespace App\Http\Controllers;

use App\Models\Chollo;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function chollosCargar(){
        $chollos=Chollo::with('user')->get();
        return view("chollos.cargar",compact('chollos'));
    }
}
