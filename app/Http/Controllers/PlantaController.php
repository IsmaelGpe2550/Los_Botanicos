<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Guardados;
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
        $user = Auth::user();
        if (empty($user->paypal_email)) {
            return redirect()->route('users.edit', ['user' => $user->id])->with('error', 'Debe registrar su cuenta de PayPal para vender productos.');
        }
        
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $image = $request->file('photo');
        $nombreArchivo = 'user_' . Auth::id() . '_' . time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('img/photos/'), $nombreArchivo);

        Planta::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'photo' => 'img/photos/' . $nombreArchivo,
            'user_id' =>  Auth::id(), 
        ]);

        return redirect()->route('plantas.index')->with('success', 'Planta añadida correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $planta = Planta::findOrFail($id);
        
        $plantas = Planta::where('user_id', $planta->user_id)
                     ->where('id', '!=', $planta->id)
                     ->inRandomOrder()
                     ->take(3)
                     ->get();

        if ($plantas->isEmpty()) {
            $plantas = Planta::inRandomOrder()->take(3)->get();
        }

        $estadoGuardado = Guardados::where('user_id', Auth::id())->where('planta_id', $id)->first();

        if($estadoGuardado){
            $guardado = true;
        }else{
            $guardado = false;
        }

        $comentarios = Comentario::with('user')->where('planta_id', $id)->get(); 

        return view('plantas.planta-show', compact('planta', 'plantas', 'comentarios','guardado'));
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
