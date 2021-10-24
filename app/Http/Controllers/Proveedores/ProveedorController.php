<?php

namespace App\Http\Controllers\Proveedores;

use App\Http\Models\Provider;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProveedorController extends Controller
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
        $providers = Provider::all();

        return view('proveedores.proveedores', compact('providers'));
    }
}
