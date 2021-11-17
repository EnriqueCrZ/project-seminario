<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Models\Inventory;
use App\Http\Models\Provider;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InventarioController extends Controller
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
        $inventory = Inventory::paginate(20);

        return view('inventario.inventario', compact('inventory'));
    }

    public function create(){
        return view('inventario.create');
    }

    public function save(Request $request){
        $inventory = new Inventory();
        $inventory->spire_part = $request->spire_part;
        $inventory->product_code= $request->product_code;
        $inventory->price = $request->price;
        $inventory->branch = $request->branch;

        $inventory->user_id_user = Auth::user()->id;
        $inventory->save();

        return redirect()->route('inventario')->with('status', 'Producto agregado!');
    }
    public function edit($id)
    {
        $inventory = Inventory::where('id_provider',$id)->first();
        return view('inventario.edit', compact('inventario'));
    }

    public function update(Request $request,$id){
        $inventory = Inventory::where('id_inventory',$id)->first();
        $inventory->spire_part = $request->spire_part;
        $inventory->product_code= $request->product_code;
        $inventory->price = $request->price;
        $inventory->branch = $request->branch;
        $inventory->save();

        return redirect()->route('inventory')->with('status', 'Proveedor actualizado!');
    }

    public function destroy(Request $request)
    {
        try{
            $id = $request->id;
            $inventory = Provider::where('id_provider',$id)->first();
            $inventory->delete();
            return true;
        }catch (QueryException $exception){
            $errorCode = $exception->getCode();
            $errorValue = $exception->getMessage();
            return view('error',compact('errorCode','errorValue'));
        }
    }

}
