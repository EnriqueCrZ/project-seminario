<?php

namespace App\Http\Controllers\registroactividad;

use App\Http\Models\Provider;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegistroActividadcontroller extends Controller{
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
        return view('registroactividad.registroactividad');
        
    }

public function create(){
    return view('registroactividad.create');
}

public function edit(){
    return view('registroactividad.edit');
}

}
