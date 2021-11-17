<?php

namespace App\Http\Controllers\RegistroActividad;

use App\Http\Models\Activity;
use App\Http\Models\Location;
use App\Http\Models\Pilot;
use App\Http\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RegistroActividadcontroller extends Controller
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
        $activities = DB::select('SELECT a.*, origin.name as origin_name, origin.latitude as origin_latitude, origin.longitude as origin_longitude,
                        destiny.name as destiny_name, destiny.latitude as destiny_latitude, destiny.longitude as destiny_longitude,
                        pilot.complete_name as pilot_name, pilot.license as pilot_license,
                        vehicle.vehicle_code as vehicle_code, vehicle.brand as vehicle_brand, vehicle.line as vehicle_line, vehicle.model as vehicle_model, vehicle.plate as vehicle_plate,
                        platform.vehicle_code as platform_code, platform.brand as platform_brand, platform.line as platform_line, platform.model as platform_model, platform.plate as platform_plate
                            FROM seminario.activity as a
                                join (seminario.location as origin, seminario.location as destiny, seminario.pilot as pilot, seminario.vehicle as vehicle, seminario.vehicle as platform)
		                            ON (origin.id_location = a.origin AND destiny.id_location = a.destiny AND pilot.id_pilot = a.pilot_id_pilot AND vehicle.id_vehicle = a.vehicle AND platform.id_vehicle = a.platform)',array(1));
        return view('registroactividad.registroactividad', compact('activities'));

    }

    public function create()
    {
        $locations = Location::all();
        $vehicles = Vehicle::all();
        $platforms = Vehicle::join('vehicle_type', 'vehicle.vehicle_type_id_vehicle_type', 'vehicle_type.id_vehicle_type')
            ->where('vehicle_type.id_vehicle_type', getPlatformId())
            ->select('vehicle.*', 'vehicle_type.vehicle_type')
            ->get();
        $pilots = Pilot::all();

        return view('registroactividad.create', compact('locations', 'vehicles', 'platforms', 'pilots'));
    }

    public function store(Request $request)
    {
        $activity = new Activity();
        $activity->id_activity = count(Activity::all()) + 1;
        $activity->description = $request->get('descripcion');
        $activity->origin = $request->get('origen');
        $activity->destiny = $request->get('destino');
        $activity->pilot_id_pilot = $request->get('piloto');
        $activity->vehicle = $request->get('vehiculo');
        $activity->platform = $request->get('plataforma');
        $activity->save();

        return redirect()->route('registroactividad')->with('status', 'Actividad Agregada!');
    }

    public function edit()
    {
        return view('registroactividad.edit');
    }

}
