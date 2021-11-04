@extends('layouts.admin')

@section('titulo')
    Crear nuevo Vehiculo
@endsection

@section('main-content')

<div class="container">
    <div class="card">
        {{--<div class="card-header">
            <div class="col-md-12 text-secondary d-flex justify-content-center text-blue text-uppercase">
                <h3>Agregar nuevo vehiculo</h3>
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
            <form action="{{route('vehiculo.guardar')}}" method="post">
                @csrf
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="plate">Numero de Placa</label>
                        <input class="form-control String" type="text" name="plate" id="plate" value="{{old('plate')}}" maxlength="45" required="required">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="brand">Marca</label>
                        <input class="form-control String" type="text" name="brand" id="brand" value="{{old('brand')}}" maxlength="45" required="required">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="model">Modelo</label>
                        <input class="form-control String" type="text" name="model" id="model" value="{{old('model')}}" maxlength="45" required="required">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="line">Linea</label>
                        <input class="form-control String" type="text" name="line" id="line" value="{{old('line')}}" maxlength="45" required="required">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="vin">Numero Serie de Chasis</label>
                        <input class="form-control String" type="text" name="vin" id="vin" value="{{old('vin')}}" maxlength="60" required="required">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="motor">Numero Serie de Motor</label>
                        <input class="form-control String" type="text" name="motor" id="motor" value="{{old('motor')}}" maxlength="45" required="required">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="cc">Centimetros Cubicos</label>
                        <input class="form-control String" type="text" name="cc" id="cc" value="{{old('cc')}}" maxlength="45" required="required">
                    </div>
                    <div class="form-group">
                        <label for="vehicle_type">Tipo de Vehiculo</label>
                        <select class="form-control" name="vehicle_type" id="vehicle_type">
                            @foreach($tiposVehiculo as $tipoVehiculo)
                                <option value="{{$tipoVehiculo->id_vehicle_type}}">{{$tipoVehiculo->vehicle_type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">Crear</button>
                    <a href="{{ url()->previous() }}" class="btn btn-danger">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
