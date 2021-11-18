<?php

namespace App\Http\Controllers\Proveedores;

use App\Http\Models\Provider;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $providers = Provider::paginate(20);

        return view('proveedores.proveedores', compact('providers'));
    }

    public function create(){
        return view('proveedores.create');
    }

    public function save(Request $request){
        $validator = Validator::make($request->all(),[
            'provider_name' => 'required|string|max:75',
            'provider_address' => 'required|string|max:125|',
            'email' => 'required|email|max:75',
            'nit' => 'required|string|max:20',
            'telefono' => 'required|int|max:45'
        ]);
        $validator->getTranslator()->setLocale('es');

        if($validator->fails()){
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
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

        $validator = Validator::make($request->all(),[
            'provider_name' => 'required|string|max:75',
            'provider_address' => 'required|string|max:125|',
            'email' => 'required|email|max:75',
            'nit' => 'required|string|max:20',
            'telefono' => 'required|int|max:45'
        ]);
        $validator->getTranslator()->setLocale('es');

        if($validator->fails()){
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
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
        }catch (QueryException $exception){
            $errorCode = $exception->getCode();
            $errorValue = $exception->getMessage();
            return view('error',compact('errorCode','errorValue'));
        }
    }

}
