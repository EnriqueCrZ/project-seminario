@extends('layouts.admin')

@section('titulo')
    Crear Proveedor
@endsection

@section('main-content')
    <div class="container">
        <div class="card">

            {{--<div class="card-header">
                <div class="col-md-12 text-secondary d-flex justify-content-center text-blue text-uppercase">
                    <h3>Crear proveedor</h3>
                </div>
            </div>--}}
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
                <form action="{{route('proveedor.store')}}" method="POST" novalidate>
                    @csrf

                    <div class="form-group">
                        <label for="provider_name">Nombre de Proveedor</label>
                        <input class="form-control String" type="text" name="provider_name" id="provider_name"
                               value="{{old('provider_name')}}" maxlength="60"
                               required="required">
                        @if($errors->has('nombre'))
                            <p class="text-danger">{{$errors->first('provider_name')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="provider_address">Dirección</label>
                        <input class="form-control String" type="text" name="provider_address" id="provider_address"
                               value="{{old('provider_address')}}" required="required"
                        >
                        @if($errors->has('provider_address'))
                            <p class="text-danger">{{$errors->first('provider_address')}}</p>
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
                        <label for="nit">NIT</label>
                        <input class="form-control String" type="text" name="nit" id="email"
                               value="{{old('nit')}}" required="required"
                        >
                        @if($errors->has('nit'))
                            <p class="text-danger">{{$errors->first('nit')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input class="form-control String" type="text" name="telefono" id="telefono"
                               value="{{old('telefono')}}" required="required" onkeydown="return check(event)"
                        >
                        @if($errors->has('telefono'))
                            <p class="text-danger">{{$errors->first('telefono')}}</p>
                        @endif
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-outline-info" type="submit">Crear</button>
                        <a href="{{ url()->previous() }}" class="btn btn-outline-danger">Regresar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function check(e) {
            tecla = (document.all) ? e.keyCode : e.which;

            //Tecla de retroceso para borrar, siempre la permite
            if (tecla == 8) {
                return true;
            }

            // Patron de entrada, en este caso solo acepta numeros y letras
            patron = /[0-9.]/;
            tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);
        };
    </script>
@endsection
