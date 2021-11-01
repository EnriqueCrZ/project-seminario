<?php

namespace App\Http\Controllers\Vehiculos;

use App\Http\Models\Provider;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VehiculosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('vehiculos.vehiculos');
        
    }

    public function create(){
        return view('vehiculos.create');
    }
    
    public function edit(){
        return view('vehiculos.edit');
    }
}

?>