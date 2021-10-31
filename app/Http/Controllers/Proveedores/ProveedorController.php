<?php

namespace App\Http\Controllers\Proveedores;

use App\Http\Models\Provider;
use App\User;
use Illuminate\Database\QueryException;
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
        $proveedor->email = $request->email;
        $proveedor->nit = $request->nit;
        $proveedor->telefono = $request->telefono;
        $proveedor->user_id_user = Auth::user()->id;
        $proveedor->save();

        return redirect()->route('proveedor')->with('status', 'Proveedor agregado!');
    }
    public function edit($id)
    {
        $provider = Provider::where('id_provider',$id)->first();
        return view('proveedores.edit', compact('provider'));
    }

    public function update(Request $request,$id){
        $proveedor = Provider::where('id_provider',$id)->first();
        $proveedor->provider_name = $request->provider_name;
        $proveedor->provider_address = $request->provider_address;
        $proveedor->email = $request->email;
        $proveedor->nit = $request->nit;
        $proveedor->telefono = $request->telefono;
        $proveedor->save();

        return redirect()->route('proveedor')->with('status', 'Proveedor actualizado!');
    }

    public function destroy(Request $request)
    {
        try{
            $id = $request->id;
            $proveedor = Provider::where('id_provider',$id)->first();
            $proveedor->delete();
            return true;
        }catch (QueryException $e){
            return $e;
        }
    }

}
