<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user,email,' . Auth::user()->id,
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|max:12|required_with:current_password',
            'password_confirmation' => 'nullable|min:8|max:12|required_with:new_password|same:new_password'
        ],[
            'new_password.min' =>'El campo Nueva Contraseña debe tener al menos 8 caracteres.',
            'new_password.max'=>'El campo Nueva Contraseña debe tener como máximo 12 caracteres.',
            'new_password.required_with'=>'El campo Contraseña Actual no debe estar vacio.',
            'password_confirmation.min' =>'El campo Confirmar Contraseña debe tener al menos 8 caracteres.',
            'password_confirmation.max'=>'El campo Confirmar Contraseña debe tener como máximo 12 caracteres.',
            'password_confirmation.required_with'=>'El campo Nueva Contraseña no debe estar vacio.',
            'password_confirmation.same'=>'Las contraseñas no coinciden.',
        ]);
        $validator->getTranslator()->setLocale('es');

        if($validator->fails()){
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        /*$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user,email,' . Auth::user()->id,
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|max:12|required_with:current_password',
            'password_confirmation' => 'nullable|min:8|max:12|required_with:new_password|same:new_password'
        ]);*/


        $user = User::find(Auth::user()->id);
        $user->username = $request->input('name');
        $user->email = $request->input('email');

        if (!is_null($request->input('current_password'))) {
            if (Hash::check($request->input('current_password'), $user->password)) {
                $user->password = $request->input('new_password');
            } else {
                return redirect()->back()->withInput();
            }
        }

        $user->save();

        return redirect()->route('profile')->withSuccess('Perfil actualizado correctamente.');
    }
}
