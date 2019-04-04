<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageRequest;

class PagesController extends Controller
{
	// protected $request;

	//  public function __construct(Request $request)
	//  {
	//  	$this->request = $request;
	//  }

	function __construct(){
        $this->middleware('example');
    }


    public function home() {
    	// return response('Contenido de la respuesta',201)
    	// 	->header('X-TOKEN','Secreto')
    	// 	->header('X-TOKEN-2','Secreto-2')
    	// 	->cookie('XX-COOKIE','micookie');
    	 return view('home');
	}

	
	public function mensajes(CreateMessageRequest $request)
	{
		$data = $request->all();
		return back()->with('info','Tu mensaje ha sido enviado correctamente :)');
		// return redirect()
		// 	->route('contactos')
		// 	->with('info','Tu mensaje ha sido enviado correctamente :)');
		// return $request->all();
	}

	public function saludo($nombre = 'Invitado')
	{
		$consolas = [
			"Play Station 4",
			"Xbox one",
			"Wii Uu"
		];
    	return view("saludo",compact('nombre','consolas'));
	}
}
