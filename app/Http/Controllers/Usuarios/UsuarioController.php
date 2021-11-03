<?php

namespace App\Http\Controllers\Usuarios;
use App\Http\Controllers\Controller;
use App\Http\Models\TipoUsuario;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $query = trim($request->get('s'));
        $users = User::where('email','LIKE','%'.$query.'%')
            ->where('id','!=',Auth::user()->id)
            ->join('user_type','user_type.id_user_type','user.user_type_id_user_type')
            ->select('user_type.description as tipoUsuario','user.username','user.email','user.is_active','user.id')
            ->orderBy('user.id','asc')
            ->paginate(20);
        return view('usuarios.index',compact('users','query'));
    }

    public function create(){
        $tipoUsuarios = TipoUsuario::all();
        return view('usuarios.create',compact('tipoUsuarios'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user,email,' . Auth::user()->id,
            'password' => 'nullable|min:8|max:12',
            'password_confirmation' => 'nullable|min:8|max:12|same:password'
        ],[
            'password.min' =>'El campo Contraseña debe tener al menos 8 caracteres.',
            'password.max'=>'El campo Contraseña debe tener como máximo 12 caracteres.',
            'password_confirmation.min' =>'El campo Confirmar Contraseña debe tener al menos 8 caracteres.',
            'password_confirmation.max'=>'El campo Confirmar Contraseña debe tener como máximo 12 caracteres.',
            'password_confirmation.same'=>'Las contraseñas no coinciden.',
        ]);
        $validator->getTranslator()->setLocale('es');

        if($validator->fails()){
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        try{
            User::create([
                'username'=>$request->input('name'),
                'password'=>Hash::make($request->input('password')),
                'email'=>$request->input('email'),
                'is_active'=>1,
                'user_type_id_user_type'=>$request->input('tipo_usuario')
            ]);
        }catch (QueryException $exception){
            $errorCode = $exception->getCode();
            $errorValue = $exception->getMessage();
            return view('error',compact('errorCode','errorValue'));
        }
        return redirect()->route('usuarios')->with('status', 'Usuario agregado!');
    }

    public function edit($id){
        $usuario = User::find($id);
        $tipoUsuarios = TipoUsuario::all();

        return view('usuarios.edit',compact('usuario','tipoUsuarios'));
    }

    public function update(Request $request, $id){
        $usuario = User::find($id);

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user,email,' . $usuario->id,
            'password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|max:12|required_with:password',
            'password_confirmation' => 'nullable|min:8|max:12|required_with:new_password|same:new_password'
        ],[
            'new_password.min' =>'El campo Nueva Contraseña debe tener al menos 8 caracteres.',
            'new_password.max'=>'El campo Nueva Contraseña debe tener como máximo 12 caracteres.',
            'new_password.required_with'=>'El campo Contraseña Actual no debe estar vacio.',
            'password_confirmation.min' =>'El campo Confirmar Nueva Contraseña debe tener al menos 8 caracteres.',
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

        $usuario->username = $request->input('name');
        $usuario->email = $request->input('email');

        if (!is_null($request->input('password'))) {
            if (Hash::check($request->input('password'), $usuario->password)) {
                $usuario->password = $request->input('new_password');
            } else {
                return redirect()->back()->withInput();
            }
        }

        $usuario->save();

        return redirect()->route('usuarios')->with('status','Usuario Actualizado.');
    }

    public function changeStatus(Request $request){
        try {
            $user = User::find($request->id);
            $user->is_active = $request->status;
            $user->save();
            return true;
        }catch (QueryException $exception){
            return $exception;
        }
    }
}
