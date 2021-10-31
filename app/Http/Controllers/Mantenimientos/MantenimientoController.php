<?php

namespace App\Http\Controllers\Mantenimiento;

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
        $mantenimiento=null;

        return view('mantenimiento.index', compact('mantenimiento'));
    }
}
