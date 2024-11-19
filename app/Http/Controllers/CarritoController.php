<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Detalles_carrito;
use App\Models\Detalles_pedido;
use App\Models\Planta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'planta_id' => 'required|exists:plantas,id',
            'amount' => 'required|integer|min:1',
        ]);
    
        $planta = Planta::find($request->planta_id);
    
        if ($planta->user_id == Auth::id()) {
            return redirect()->back()->with('error', 'No puedes comprar tus propios productos.');
        }

        $request->validate([
            'amount' => 'required|integer|min:1|max:' . $planta->stock,
        ]);
    
        $carrito = Carrito::where('user_id', Auth::id())->first();
        if (!$carrito) {
            $carrito = Carrito::create([
                'user_id' => Auth::id(),
                'total_cost' => 0,
            ]);
        }
    
        $detalle = Detalles_Carrito::where('carrito_id', $carrito->id)
            ->where('planta_id', $request->planta_id)
            ->first();
    
        if ($detalle) {
            $detalle->amount += $request->amount;
            $detalle->save();
        } else {
            $detalle = Detalles_Carrito::create([
                'carrito_id' => $carrito->id,
                'planta_id' => $request->planta_id,
                'amount' => $request->amount,
            ]);
        }
    
        $carrito->total_cost += $planta->price * $request->amount;
        $carrito->save();

        $planta->stock -= $request->amount;
        $planta->save();
        return redirect()->back()->with('success', 'Planta añadida al carrito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Carrito $carrito)
    {
        if($carrito){
            $detalles = Detalles_Carrito::where('carrito_id', $carrito->id)->get();
            return view('carrito.carrito-show', compact('carrito', 'detalles'));
        }else{
            return redirect()->route('sin_carrito');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carrito $carrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carrito $carrito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carrito $carrito)
    {
        //
    }

}
