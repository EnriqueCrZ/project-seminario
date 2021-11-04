<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Localizacion\LocationController;
use App\User;
use Illuminate\Http\Request;

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
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];
        $locations = LocationController::getLocations();

        return view('home', compact('widget','locations'));
    }

    private static function getGmaps(){
        $locations = LocationController::getLocations();
        //$locations = collect(($locations));
        return view('localizacion.index',compact('locations'));
    }
}
