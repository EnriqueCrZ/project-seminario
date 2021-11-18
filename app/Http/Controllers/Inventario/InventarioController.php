<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Models\Inventory;
use App\Http\Models\Provider;
use App\Http\Models\Stock;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $inventories = Inventory::join('provider','provider.id_provider','inventory.provider_id_provider')
            ->join('stock','stock.inventory_id_inventory','inventory.id_inventory')
            ->paginate(20);

        return view('inventario.inventario', compact('inventories'));
    }

    public function create(){
        $providers = Provider::all();
        return view('inventario.create',compact('providers'));
    }

    public function save(Request $request){
        $validator = Validator::make($request->all(),[
            'product_code' => 'required',
            'spare_part' => 'required',
            'provider_address' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'provider_id_provider' => 'required',
        ]);
        $validator->getTranslator()->setLocale('es');

        if($validator->fails()){
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        };

        $inventory = new Inventory();
        $inventory->spare_part = $request->spare_part;
        $inventory->product_code= $request->product_code;
        $inventory->price = $request->price;
        $inventory->branch = $request->branch;

        $inventory->user_id_user = Auth::user()->id;
        $inventory->provider_id_provider = $request->provider_id_provider;
        $inventory->save();

        $stock = new Stock();
        $stock->quantity = $request->stock;
        $stock->inventory_id_inventory = $inventory->id_inventory;
        $stock->user_id = Auth::user()->id;
        $stock->warehouse = '';
        $stock->save();

        return redirect()->route('inventario')->with('status', 'Producto agregado!');
    }
    public function edit($id)
    {
        $providers = Provider::all();
        $inventory = Inventory::where('id_inventory',$id)
                ->join('provider','provider.id_provider','inventory.provider_id_provider')
                ->join('stock','stock.inventory_id_inventory','inventory.id_inventory')
                ->first();
        return view('inventario.edit', compact('inventory','providers'));
    }

    public function update(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'product_code' => 'required',
            'spare_part' => 'required',
            'provider_address' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'provider_id_provider' => 'required',
        ]);
        $validator->getTranslator()->setLocale('es');

        if($validator->fails()){
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        };
        $inventory = Inventory::where('id_inventory',$id)->first();
        $inventory->spare_part = $request->spare_part;
        $inventory->product_code= $request->product_code;
        $inventory->price = $request->price;
        $inventory->branch = $request->branch;
        $inventory->provider_id_provider = $request->provider_id_provider;
        $inventory->save();

        $stock = Stock::where('inventory_id_inventory',$id)->first();
        $stock->quantity = $request->stock;
        $stock->save();

        return redirect()->route('inventario')->with('status', 'Producto actualizado!');
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
