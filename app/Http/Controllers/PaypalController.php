<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Detalles_carrito;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PaypalController extends Controller
{
    public function validar_direccion(Request $request){
        $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'colonia' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'codigo_postal' => 'required|digits:5',
            'telefono' => 'required|digits:10',
        ]);

        $carrito = Carrito::find($request->carrito_id);

        if ($carrito) {
            $datosCarrito = $request->only([
                'nombre_completo', 'direccion', 'colonia', 'ciudad', 
                'estado', 'codigo_postal', 'telefono', 'carrito_id',
            ]);
            session()->put('datos', $datosCarrito);
            return redirect()->route('pago_form');
        } else {
            return redirect()->back()->with('error', 'El carrito no existe');
        }
    }

    public function pago_form()
    {
        $datos = session('datos');
        session()->forget('datos');  
        $carrito = Carrito::find($datos['carrito_id']);
        if ($carrito) {
            $detalles = Detalles_carrito::where('carrito_id', $carrito->id)->get();
            return view('carrito.pago-form', compact('carrito', 'datos', 'detalles'));
        } else {
            return redirect()->route('carrito')->with('error', 'Carrito no encontrado');
        }
    }
}
