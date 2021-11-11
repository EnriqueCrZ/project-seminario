<?php

namespace App\Http\Controllers\Pilotos;

use App\Http\Models\Provider;
use App\Http\Models\Pilot;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PilotoController extends Controller
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
        $pilots = Pilot::paginate(20);

        return view('piloto.piloto', compact('pilots'));
    }

    public function create(){
        return view('piloto.create');
    }

    public function save(Request $request){
        $pilot = new Pilot();
        $pilot->complete_name = $request->complete_name;
        $pilot->license = $request->license;
        $pilot->phone_number = $request->phone_number;
        $pilot->address = $request->address;
        $pilot->save();

        return redirect()->route('piloto')->with('status', 'Piloto agregado!');
    }
    public function edit($id)
    {
        $pilot = Pilot::where('id_pilot',$id)->first();
        return view('pilot.edit', compact('pilot'));
    }

    public function update(Request $request,$id){
        $pilot = Pilot::where('id_pilot',$id)->first();
        $pilot->complete_name = $request->complete_name;
        $pilot->license = $request->license;
        $pilot->phone_number = $request->phone_number;
        $pilot->adress = $request->adress;
        $pilot->save();

        return redirect()->route('pilot')->with('status', 'Piloto actualizado!');
    }

    public function destroy(Request $request)
    {
        try{
            $id = $request->id;
            $pilot = Pilot::where('id_pilot',$id)->first();
            $pilot->delete();
            return true;
        }catch (QueryException $exception){
            $errorCode = $exception->getCode();
            $errorValue = $exception->getMessage();
            return view('error',compact('errorCode','errorValue'));
        }
    }

}
