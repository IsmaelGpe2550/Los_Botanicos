<?php

namespace App\Http\Controllers;

use App\Mail\NotificacionPedido;
use App\Models\Carrito;
use App\Models\Guardados;
use App\Models\Planta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function landingpage() {
        $plantas = Planta::inRandomOrder()->take(3)->get();
        Mail::to('ismael@gmail.com')->send(new NotificacionPedido());
    
        return view('landingpage', compact('plantas'));
    }

    public function index() {
        $plantas = Planta::inRandomOrder()->paginate(30);
        $guardadosIds = Guardados::where('user_id', Auth::id())->pluck('planta_id')->toArray();
        $carrito = Carrito::where('user_id', Auth::id())->first();
        return view('index.index', compact('plantas', 'guardadosIds', 'carrito'));
    }

    public function sin_carrito(){
        return view('carrito.sin-carrito');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $plantas = Planta::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->paginate(30);

        $guardadosIds = Guardados::where('user_id', Auth::id())->pluck('planta_id')->toArray();
        $carrito = Carrito::where('user_id', Auth::id())->first();

        return view('index.index', compact('plantas', 'query', 'guardadosIds', 'carrito'));
    }
}
