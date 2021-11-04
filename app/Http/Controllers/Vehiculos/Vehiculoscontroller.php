<?php

namespace App\Http\Controllers\Vehiculos;

use App\Http\Models\Vehicle;
use App\Http\Models\VehicleType;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Vehiculoscontroller extends Controller
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
    public function index(Request $request)
    {
        $query = trim($request->get('s'));
        $vehiculos = Vehicle::join('vehicle_type','vehicle_type.id_vehicle_type','vehicle.vehicle_type_id_vehicle_type')
                    ->select('vehicle.*','vehicle_type.vehicle_type as vehicle_type')
                    ->where(function ($query_search) use ($query) {
                        $query_search->where('vehicle.brand', 'LIKE', '%' . $query . '%')
                            ->orWhere('vehicle.model', 'LIKE', '%' . $query . '%')
                            ->orWhere('vehicle.vehicle_code', 'LIKE', '%' . $query . '%')
                            ->orWhere('vehicle.plate', 'LIKE', '%' . $query . '%')
                            ->orWhere('vehicle_type', 'LIKE', '%' . $query . '%');
                            })
                    ->paginate(20);
        return view('vehiculos.vehiculos',compact('vehiculos','query'));

    }

    public function create(){
        $tiposVehiculo = VehicleType::all();
        return view('vehiculos.create',compact('tiposVehiculo'));
    }

    public function store(Request $request){
        $vehicle = new Vehicle();
        $vehicle->brand = $request->brand;
        $vehicle->model = $request->model;
        $vehicle->vehicle_code = $request->vin;
        $vehicle->entry_date = date('Y-m-d H:i', strtotime(Carbon::now()));
        $vehicle->plate = $request->plate;
        $vehicle->line = $request->line;
        $vehicle->motor = $request->motor;
        $vehicle->cc = $request->cc;
        $vehicle->vehicle_type_id_vehicle_type = $request->vehicle_type;
        $vehicle->save();

        return redirect()->route('vehiculo')->with('status', 'Vehiculo agregado!');
    }

    public function edit($id){
        $vehiculo = Vehicle::find($id);
        $tiposVehiculo = VehicleType::all();
        return view('vehiculos.edit',compact('vehiculo','tiposVehiculo'));
    }

    public function update(Request $request,$id){
        $vehicle = Vehicle::find($id);

        $vehicle->brand = $request->brand;
        $vehicle->model = $request->model;
        $vehicle->vehicle_code = $request->vin;
        $vehicle->plate = $request->plate;
        $vehicle->line = $request->line;
        $vehicle->motor = $request->motor;
        $vehicle->cc = $request->cc;
        $vehicle->vehicle_type_id_vehicle_type = $request->vehicle_type;
        $vehicle->save();

        return redirect()->route('vehiculo')->with('status', 'Vehiculo actualizado!');
    }

    public function destroy(Request $request){
        try{
            $id = $request->id;
            $vehicle = Vehicle::find($id);
            $vehicle->delete();
            return true;
        }catch (QueryException $exception){
            $errorCode = $exception->getCode();
            $errorValue = $exception->getMessage();
            return view('error',compact('errorCode','errorValue'));
        }
    }
}
