<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Vehiculos;
use Illuminate\Http\Request;
use App\Models\ordenes;

class Dashboard extends Controller
{
    public function index()
    {

        if (!Auth::check()) {
            return view('index');
        }
        $vehiculos = Vehiculos::all();
        $ordenes = ordenes::all();

        return view('dashboard', compact('vehiculos', 'ordenes'));
    }

    public function politicas()
    {
        return view('privacy-policy');
    }

    public function terminos()
    {
        return view('terms');
    }

}