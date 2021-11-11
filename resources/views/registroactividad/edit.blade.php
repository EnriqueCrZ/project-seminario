@extends('layouts.admin')

@section('titulo')
    Editar actividad
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
            <form action="" method="post">
                @csrf
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="plate">Numero de Guia</label>
                        <input class="form-control String" type="text" name="plate" id="plate" value="" maxlength="45" required="required">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="brand">Codigo de Vehiculo</label>
                        <select class="form-control" name="vehicle_type" id="vehicle_type">
                            
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="model">Vehiculo</label>
                        <input class="form-control String" type="text" name="model" id="model" value="" maxlength="45" required="required">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="line">Placa</label>
                        <input class="form-control String" type="text" name="line" id="line" value="" maxlength="45" required="required">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="vin">Codigo Gondola/Plataforma</label>
                        <input class="form-control String" type="text" name="vin" id="vin" value="" maxlength="60" required="required">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="motor">Nombre Gondola/Plataforma</label>
                        <input class="form-control String" type="text" name="motor" id="motor" value="" maxlength="45" required="required">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="cc">Fecha de Asignación</label>
                        <input class="form-control String" type="date" name="cc" id="cc" value="" maxlength="45" required="required">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="vehicle_type">Digitador</label>
                        <select class="form-control" name="vehicle_type" id="vehicle_type">
                            
                        </select>
                    </div>
                </div>
                <div class="form-row">
                <div class="col-md-2 mb-3">
                        <label for="vehicle_type">Tipo de Trabajo</label>
                        <select class="form-control" name="vehicle_type" id="vehicle_type">
                            
                        </select>
                    </div>
                    <div class="col-md-10 mb-3">
                        <label for="vehicle_type">Descripción del Trabajo</label>
                        <input class="form-control String" type="text" name="motor" id="motor" value="" maxlength="45" required="required">
                    </div>
                </div>
                
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">Agregar</button>
                    <a href="{{ url()->previous() }}" class="btn btn-danger">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection