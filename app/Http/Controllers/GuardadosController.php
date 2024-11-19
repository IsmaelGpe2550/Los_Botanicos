<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guardados;
use App\Models\Planta;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GuardadosController extends Controller
{
    public function guardados_index()
    {
        $userId = Auth::id();

        $plantas = Planta::whereExists(function ($query) use ($userId) {
            $query->select(DB::raw(1))
                ->from('guardados')
                ->whereRaw('guardados.planta_id = plantas.id')
                ->where('guardados.user_id', $userId);
        })->paginate(30);

        return view('guardados.guardados-show', compact('plantas'));
    }

    public function guardar(Request $request){
        $guardado = Guardados::where('user_id', Auth::id())->where('planta_id', $request->planta_id)->first();

        if ($guardado) {
            $guardado->delete();
        } else {
            Guardados::create([
                'planta_id' => $request->planta_id,
                'user_id' => Auth::id(),
            ]);
        }
        return redirect()->route('plantas.show', $request->planta_id);
    }
}
