<?php

namespace App\Http\Controllers;

use App\Colors\RandomColor;
use App\Http\Controllers\Localizacion\LocationController;
use App\Http\Models\Inventory;
use App\Http\Models\Pilot;
use App\Http\Models\Provider;
use App\Http\Models\Vehicle;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
        return self::getHome();
    }

    private static function getHome(){

        $colors = [];

        $activitiesCollection = DB::select('SELECT a.*, origin.name as origin_name, origin.latitude as origin_latitude, origin.longitude as origin_longitude,
                        destiny.name as destiny_name, destiny.latitude as destiny_latitude, destiny.longitude as destiny_longitude,
                        pilot.complete_name as pilot_name, pilot.license as pilot_license,
                        vehicle.vehicle_code as vehicle_code, vehicle.brand as vehicle_brand, vehicle.line as vehicle_line, vehicle.model as vehicle_model, vehicle.plate as vehicle_plate,
                        platform.vehicle_code as platform_code, platform.brand as platform_brand, platform.line as platform_line, platform.model as platform_model, platform.plate as platform_plate
                            FROM seminario.activity as a
                                join (seminario.location as origin, seminario.location as destiny, seminario.pilot as pilot, seminario.vehicle as vehicle, seminario.vehicle as platform)
		                            ON (origin.id_location = a.origin AND destiny.id_location = a.destiny AND pilot.id_pilot = a.pilot_id_pilot AND vehicle.id_vehicle = a.vehicle AND platform.id_vehicle = a.platform)
		                            WHERE a.status = 1',array(1));

        foreach($activitiesCollection as $activity){
            $colors[$activity->id_activity] = RandomColor::one();
        }

        $users = User::count();

        $widget = [
            'users' => $users,
            'providers'=> Provider::count(),
            'pilots'=> Pilot::count(),
            'products'=> Inventory::count()
            //...
        ];
        $locations = LocationController::getLocations();

        return view('home', compact('widget','locations','activitiesCollection','colors'));
    }

    private static function getGmaps(){
        $locations = LocationController::getLocations();
        //$locations = collect(($locations));
        return view('localizacion.index',compact('locations'));
    }
}
