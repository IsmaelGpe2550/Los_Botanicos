<?php

namespace App\Http\Controllers;

use App\Models\Planta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlantaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plantas = Planta::all();
        return view('plantas.planta-index', compact('plantas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('plantas.planta-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validaciones para la imagen
        ]);
    
        // Subida de la imagen
        $image = $request->file('photo');
        $nombreArchivo = 'user_' . Auth::id() . '_' . time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('img/photos/'), $nombreArchivo);
    
        // Crear la nueva planta
        Planta::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'photo' => 'img/photos/' . $nombreArchivo,
            'user_id' =>  Auth::id(),  // Guarda la ruta de la imagen
        ]);

        return redirect()->route('plantas.index')->with('success', 'Planta actualizada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $planta = Planta::findOrFail($id);
    return view('plantas.planta-show', compact('planta'));
}

public function ventas()
{
    // Obtener las plantas del usuario autenticado
    $plantas = Planta::where('user_id', auth()->id())->get();

    // Retornar la vista de ventas con las plantas del usuario
    return view('plantas.planta-venta', compact('plantas'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Planta $planta)
    {
        return view('plantas.planta-edit', compact('planta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Planta $planta)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if($request->hasFile('photo')) {

            if($planta->photo && file_exists(public_path($planta->photo))) {
                unlink(public_path($planta->photo));
            }
    
            $image = $request->file('photo');
            $nombreArchivo = 'user_' . Auth::id() . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/photos/'), $nombreArchivo);
    
            $planta->photo = 'img/photos/' . $nombreArchivo;
        }
    
        $planta->update($request->except('photo'));
    
        return redirect()->route('plantas.index')->with('success', 'Planta actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Planta $planta)
    {
        $planta->delete();
        return redirect()->route('plantas.index')->with('success', 'Planta eliminada exitosamente.');
    }
}
