@extends('layouts.admin')

@section('titulo')
    Editar Usuario {{$usuario->username}}
@endsection

@section('main-content')
    <div class="container">
        <div class="card">

            <div class="card-body">

                @if ( ! $errors->isEmpty() )
                    <div class="row">
                        @foreach ( $errors->all() as $error )
                            <div class="col-md-6 col-md-offset-2 alert alert-danger">{{ $error }}</div>
                        @endforeach
                    </div>
                @elseif ( Session::has( 'message' ) )
                    <div class="row">
                        <div class="col-md-6 col-md-offset-2 alert alert-success">{{ Session::get( 'message' ) }}</div>
                    </div>
                @else
                    <p>&nbsp;</p>
                @endif
                <form action="{{route('usuarios.actualizar',$usuario->id)}}" method="POST" novalidate autocomplete="off">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nombre de Usuario</label>
                        <input class="form-control String" type="text" name="name" id="name"
                               value="{{old('name',$usuario->username)}}" maxlength="60"
                               required="required">
                        @if($errors->has('name'))
                            <p class="text-danger">{{$errors->first('name')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control String" type="email" name="email" id="email"
                               value="{{old('email',$usuario->email)}}" required="required"
                        >
                        @if($errors->has('email'))
                            <p class="text-danger">{{$errors->first('email')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Contrase??a Actual</label>
                        <input class="form-control " type="password" name="password" id="password"

                        >
                        @if($errors->has('password'))
                            <p class="text-danger">{{$errors->first('password')}}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="new_password">Nueva Contrase??a</label>
                        <input class="form-control " type="password" name="new_password" id="new_password"

                        >
                        @if($errors->has('new_password'))
                            <p class="text-danger">{{$errors->first('new_password')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirmar Nueva Contrase??a</label>
                        <input class="form-control String" type="password" name="password_confirmation" id="password_confirmation"

                        >
                        @if($errors->has('password_confirmation'))
                            <p class="text-danger">{{$errors->first('password_confirmation')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tipo_usuario">Tipo de Usuario</label>
                        <select class="form-control" name="tipo_usuario" id="tipo_usuario">
                            @foreach($tipoUsuarios as $tipoUsuario)
                                <option value="{{$tipoUsuario->id_user_type}}" @if($usuario->user_type_id_user_type == $tipoUsuario->id_user_type) selected @endif >{{$tipoUsuario->description}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <button class="btn btn-primary" type="submit">Actualizar</button>
                        <a href="{{ url()->previous() }}" class="btn btn-danger">Regresar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
