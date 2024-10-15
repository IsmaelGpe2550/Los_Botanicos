<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('landingpage');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        
        return redirect('/')->with('success', 'Registro exitoso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('profile.profile');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('profile.profile-edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'description' => 'required|string|max:1000',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
        ]);
    
        $user = User::findOrFail($id);
        $defaultProfilePhoto = 'img/profile-photos/default-profile.png';
    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->description = $request->description;
        $image = $request->file('profile_photo');
        
    
        if ($image) {

            if ($user->profile_photo !== $defaultProfilePhoto) {
                unlink($user->profile_photo); 
            }

            $nombreArchivo = 'user_' . Auth::id() . '_' . time() . '.' . $image->getClientOriginalExtension();
            $user->profile_photo = 'img/profile-photos/' . $nombreArchivo;
            $image->move(public_path('img/profile-photos/'), $nombreArchivo);
        }
    
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
    
        $user->save();
    
        return redirect()->route('users.show', Auth::id())->with('success', 'Perfil actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if ($user->profile_photo && $user->profile_photo !== 'img/profile-photos/default-profile.png') {
            $filePath = $user->profile_photo; 

            if (file_exists($filePath)) {
                unlink($filePath); 
            }
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
