<?php

namespace App\Http\Controllers\Proveedores;

use App\Http\Models\Provider;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

    public function create(){
        return view('proveedores.create');
    }

    public function save(Request $request){
        $proveedor = new Provider();
        $proveedor->provider_name = $request->provider_name;
        $proveedor->provider_address = $request->provider_address;
        $proveedor->user_id_user = Auth::user()->id;
        $proveedor->save();

        return redirect()->route('proveedor')->with('status', 'Proveedor agregado!');
    }
}
