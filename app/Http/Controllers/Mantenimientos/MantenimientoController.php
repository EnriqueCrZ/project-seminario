<?php

namespace App\Http\Controllers\Mantenimientos;

use App\Http\Models\Maintenance;
use App\Http\Models\MaintenanceType;
use App\Http\Models\Provider;
use App\Http\Models\Vehicle;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MantenimientoController extends Controller
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
        $mantenimiento= Maintenance::all();

        return view('mantenimiento.mantenimiento', compact('mantenimiento'));
    }

    public function insumos(){
        return view('mantenimiento.insumos');
    }
    public function proximos(){
        return view('mantenimiento.proximos');
    }

    public function estatus(){
        $mantenimientos = Maintenance::join('vehicle','vehicle.id_vehicle','maintenance.vehicle_id_vehicle')
            ->join('maintenance_type','maintenance_type.id_maintenance_type','maintenance.maintenance_type_id_maintenance_type')
            ->get();
        return view('mantenimiento.estatus',compact('mantenimientos'));
    }

    public function returnModalMantenimiento(){
        $vehiculos = Vehicle::all();
        $mantenimientoTipos = MaintenanceType::all();
        return view('mantenimiento.modal.mantenimiento',compact('vehiculos','mantenimientoTipos'));
    }
    public function returnModalMantenimientoProgramar(){
        return view('mantenimiento.modal.mantenimientoProgramar');
    }
    public function returnModalMantenimientoProducto(){
        return view('mantenimiento.modal.mantenimientoProducto');
    }
    public function returnModalMantenimientoRetirar(){
        return view('mantenimiento.modal.mantenimientoRetirar');
    }

    public function saveMantenimiento(Request $request){

        try {
            $mantenimiento = new Maintenance();
            $mantenimiento->service_number = $request->service_number;
            $mantenimiento->start_date = date('Y-m-d',strtotime($request->start_date));
            $mantenimiento->status = 1;
            $mantenimiento->service_date = date('Y-m-d',strtotime($request->service_date));
            $mantenimiento->service_responsable = $request->responsable;
            $mantenimiento->vehicle_id_vehicle = $request->vehiculo;
            $mantenimiento->user_id_user = Auth::user()->id;
            $mantenimiento->maintenance_type_id_maintenance_type = 1;
            $mantenimiento->save();
            return $mantenimiento;
        }catch (QueryException $e){
            return $e;
        }
    }

    public function changeStatus(Request $request){
        try {
            $maintenance = Maintenance::find($request->id);
            $maintenance->status = $request->status;
            $maintenance->save();
            return true;
        }catch (QueryException $exception){
            return $exception;
        }
    }
}
