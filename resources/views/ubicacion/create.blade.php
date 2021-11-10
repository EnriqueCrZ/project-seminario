@extends('layouts.admin')

@section('titulo')
    Crear Piloto
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
                <form action="{{route('ubicacion.store')}}" method="POST" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="id_location">Codigo de la Ubicacion</label>
                        <input class="form-control String" type="text" name="id_location" id="id_location"
                               value="{{old('id_location')}}" maxlength="60"
                               required="required">
                        @if($errors->has('id_location'))
                            <p class="text-danger">{{$errors->first('id_location')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="name">Nombre de la Ubicacion</label>
                        <input class="form-control String" type="text" name="name" id="name"
                               value="{{old('name')}}" maxlength="60"
                               required="required">
                        @if($errors->has('nombre'))
                            <p class="text-danger">{{$errors->first('name')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="latitude">Latitud</label>
                        <input class="form-control String" type="text" name="latitude" id="latitude"
                               value="{{old('latitude')}}" required="required"
                        >
                        @if($errors->has('latitude'))
                            <p class="text-danger">{{$errors->first('latitude')}}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="longitude">Longitud</label>
                        <input class="form-control String" type="text" name="longitude" id="longitude"
                               value="{{old('longitude')}}" required="required"
                        >
                        @if($errors->has('longitude'))
                            <p class="text-danger">{{$errors->first('longitude')}}</p>
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

@endsection
