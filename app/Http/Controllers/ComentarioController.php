<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function agregar_comentario(Request $request)
    {
        $request->validate([
            'contenido' => 'required|string|max:255',
            'planta_id' => 'required|exists:plantas,id',
        ]);
    
        $comentario = Comentario::create([
            'content' => $request->contenido,
            'planta_id' => $request->planta_id,
            'user_id' => Auth::id(), 
        ]);

        return redirect()->back();
    }

    public function eliminar_comentario(Request $request)
    {
        $comentario = Comentario::findOrFail($request->comentario_id);
        $comentario->delete();
        return redirect()->back();
    }
}
