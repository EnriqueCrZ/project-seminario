@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <div class="card">

            <div class="card-header">
                <div class="col-md-12 text-secondary d-flex justify-content-center text-blue text-uppercase">
                    <h3>Crear usuario</h3>
                </div>
            </div>
            <div class="card-body">

                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                        @endforeach
                    </ul @endif
                <form action="{{route('usuarios.guardar')}}" method="POST" novalidate autocomplete="off">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nombre de Usuario</label>
                        <input class="form-control String" type="text" name="name" id="name"
                               value="{{old('name')}}" maxlength="60"
                               required="required">
                        @if($errors->has('name'))
                            <p class="text-danger">{{$errors->first('name')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control String" type="email" name="email" id="email"
                               value="{{old('email')}}" required="required"
                        >
                        @if($errors->has('email'))
                            <p class="text-danger">{{$errors->first('email')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input class="form-control " type="password" name="password" id="password"
                               required
                        >
                        @if($errors->has('password'))
                            <p class="text-danger">{{$errors->first('password')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirmar Contraseña</label>
                        <input class="form-control String" type="password" name="confirm_password" id="confirm_password"
                               required="required"
                        >
                        @if($errors->has('confirm_password'))
                            <p class="text-danger">{{$errors->first('confirm_password')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tipo_usuario">Tipo de Usuario</label>
                        <select class="form-control" name="tipo_usuario" id="tipo_usuario">
                            @foreach($tipoUsuarios as $tipoUsuario)
                                <option value="{{$tipoUsuario->id_user_type}}">{{$tipoUsuario->description}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <button class="btn btn-primary" type="submit">Crear</button>
                        <a href="{{ url()->previous() }}" class="btn btn-danger">Regresar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
