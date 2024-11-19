<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Detalles_carrito;
use App\Models\Planta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetallesCarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carrito = Carrito::where('user_id',Auth::id())->first();
        if($carrito){
            $detalles = Detalles_Carrito::where('carrito_id', $carrito->id)->get();
            return view('carrito.resumen-carrito', compact('carrito', 'detalles'));
        }else{
            return redirect()->route('sin_carrito');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(detalles_carrito $detalles_carrito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(detalles_carrito $detalles_carrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, detalles_carrito $detalles_carrito)
    {
        $planta = Planta::find($detalles_carrito->planta_id);

        if (!$planta) {
            $carritoId = $detalles_carrito->carrito_id;
            $detalles_carrito->delete();
    
            $detallesCount = Detalles_carrito::where('carrito_id', $carritoId)->count();

            if ($detallesCount == 0) {
                Carrito::find($carritoId)->delete();
                return redirect()->route('sin_carrito')->with('success', 'Producto eliminado del carrito porque ya no está disponible.');
            }
            
            return redirect()->route('carritos.show', $carritoId)->with('success', 'Producto eliminado del carrito porque ya no está disponible.');
        }

        $request->validate([
            'amount' => 'required|integer|min:1|max:' . ($planta->stock + $detalles_carrito->amount),
        ]);

        $diferencia = $request->amount - $detalles_carrito->amount;

        $detalles_carrito->amount = $request->amount;

        if ($diferencia > 0) {
            if ($diferencia > $planta->stock) {
                return redirect()->back()->with('error', 'No hay suficiente stock disponible.');
            }
            $planta->stock -= $diferencia;
        } else {
            $planta->stock += abs($diferencia);
        }

        $detalles_carrito->save();
        $planta->save();

        $carrito = Carrito::find($detalles_carrito->carrito_id);
        $detalles = Detalles_carrito::where('carrito_id', $carrito->id)->get();
        $carrito->total_cost = 0;
        foreach ($detalles as $detalle){
            $p = Planta::find($detalle->planta_id);
            $subtotal = $detalle->amount * $p->price;
            $carrito -> total_cost += $subtotal;
        }
        $carrito->save();

        return redirect()->route('carritos.show', $detalles_carrito->carrito_id)->with('success', 'Cantidad actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(detalles_carrito $detalles_carrito)
    {
        $carritoId = $detalles_carrito->carrito_id;
        $planta = Planta::find($detalles_carrito->planta_id);

        if ($planta) {
            $planta->stock += $detalles_carrito->amount;
            $planta->save();
        }

        $detalles_carrito->delete();
        $detallesCount = Detalles_carrito::where('carrito_id', $carritoId)->count();

        if ($detallesCount == 0) {
            Carrito::find($carritoId)->delete();
            return redirect()->route('sin_carrito');
        }

        return redirect()->route('carritos.show', $carritoId)->with('success', 'Producto eliminado del carrito correctamente.');
    }
}
