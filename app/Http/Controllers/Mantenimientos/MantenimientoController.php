<?php

namespace App\Http\Controllers\Mantenimientos;

use App\Http\Models\Maintenance;
use App\Http\Models\Provider;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('mantenimiento.estatus');
    }

    public function returnModalMantenimiento(){
        return view('mantenimiento.modal.mantenimiento');
    }
}
