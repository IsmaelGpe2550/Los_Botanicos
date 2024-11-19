<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use App\Models\Detalles_pedido;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetallesPedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = Detalles_pedido::where('vendedor_id', Auth::id())->get();
        return view('ventas.mis-ventas', compact('ventas'));
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
    public function show($id)
    {
        $venta = Detalles_pedido::find($id);
        $pedido = Pedidos::find($venta->pedido_id);
        $usuario = User::find($pedido->comprador_id); 
        return view('ventas.detalles-venta', compact('venta', 'usuario', 'pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:pendiente,en camino,entregado',
        ]);
    
        $venta = Detalles_pedido::findOrFail($id);
        $venta->status = $request->input('status');
        $venta->save();
    
        return redirect()->route('detalles_pedidos.index', $venta->id)->with('success', 'Estado del pedido actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
