<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chollo extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function Categorias(){
        return $this->belongsToMany(Categoria::class,"chollo_categoria");
    }

    public function attachCategorias($categorias)
    {
        $this -> categorias() -> attach($categorias);
    }

    public function detachCategorias($categorias)
    {
        $this -> categorias() -> detach($categorias);
    }
}
