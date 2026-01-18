<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vehiculos;

class IndexController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculos::all();
        return view('index', compact('vehiculos'));
    }
}
