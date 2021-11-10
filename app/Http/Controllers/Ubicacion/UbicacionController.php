<?php

namespace App\Http\Controllers\Ubicacion;

use App\Http\Models\Provider;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UbicacionController extends Controller
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
        $location = Location::paginate(20);

        return view('ubicacion.ubicacion', compact('logitud'));
    }

    public function create(){
        return view('ubicacion.create');
    }

    public function save(Request $request){
        $location = new Location();
        $location->name = $request->name;
        $location->latitude = $request->latitude;
        $location->longitude = $request->longitude;
        $location->user_id_user = Auth::user()->id;
        $location->save();

        return redirect()->route('ubicacion')->with('status', 'Ubicacion agregada!');
    }
    public function edit($id)
    {
        $location = Location::where('id_location',$id)->first();
        return view('ubicacion.edit', compact('location'));
    }

    public function update(Request $request,$id){
        $location = Provider::where('id_location',$id)->first();
        $location->name = $request->name;
        $location->latitude = $request->latitude;
        $location->longitude = $request->longitude;
        $location->save();

        return redirect()->route('ubicacion')->with('status', 'Ubicacion actualizado!');
    }

    public function destroy(Request $request)
    {
        try{
            $id = $request->id;
            $location = Location::where('id_location',$id)->first();
            $location->delete();
            return true;
        }catch (QueryException $exception){
            $errorCode = $exception->getCode();
            $errorValue = $exception->getMessage();
            return view('error',compact('errorCode','errorValue'));
        }
    }

}
