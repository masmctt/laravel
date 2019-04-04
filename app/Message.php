<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // por default el nombre de la tabla es el plural de la clase y en minusculas 'messages'
    // pero si no coincide la tabla, debemos definirla.

    //protected $table = 'nombre_de_mi_tabla';

    //Asignacion masiva, con esto solo se actualizaran masivamente estos campos (Insert o Update)
    protected $fillable = ['nombre','email','mensaje'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
