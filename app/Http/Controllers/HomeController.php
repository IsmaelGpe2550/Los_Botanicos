<?php

namespace App\Http\Controllers;

use App\Models\Planta;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $users = User::all();
        $plantas = Planta::all();

        return view('landingpage');
    }
}
