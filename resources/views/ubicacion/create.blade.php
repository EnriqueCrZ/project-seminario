@extends('layouts.admin')

@section('titulo')
    Crear Piloto
@endsection

@section('main-content')
    <style>
        #mapPicker {
            display: block;
            position: absolute;
            top:0;
            right: 0;
            bottom: 0;
            left: 0;
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
        }
    </style>
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
                        <label for="name">Nombre de la Ubicacion</label>
                        <input class="form-control String" type="text" name="name" id="name"
                               value="{{old('name')}}" maxlength="60"
                               required="required">
                        @if($errors->has('nombre'))
                            <p class="text-danger">{{$errors->first('name')}}</p>
                        @endif
                    </div>
                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">
                    <div class="card shadow mb-4">
                        <div class="card-body" style="height: 500px; width: 100%; position: relative">
                            <div id="mapPicker">

                            </div>
                        </div>
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
