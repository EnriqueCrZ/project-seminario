@extends('layouts.admin')

@section('main-content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="col-md-12 text-secondary d-flex justify-content-center text-blue text-uppercase">
                <h3>Editar vehiculo</h3>
            </div>
        </div>

        <div class="card-body">
            <form action="" method="post">
                <div class="form-row">

                    <div class="col-md-3 mb-3">
                        <label for="provider_name">Numero de Placa</label>
                        <input class="form-control String" type="text" name="provider_name" id="provider_name" value="{{old('provider_name')}}" maxlength="60" required="required">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="provider_name">Marca</label>
                        <input class="form-control String" type="text" name="provider_name" id="provider_name" value="{{old('provider_name')}}" maxlength="60" required="required">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="provider_name">Modelo</label>
                        <input class="form-control String" type="text" name="provider_name" id="provider_name" value="{{old('provider_name')}}" maxlength="60" required="required">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="provider_name">Linea</label>
                        <input class="form-control String" type="text" name="provider_name" id="provider_name" value="{{old('provider_name')}}" maxlength="60" required="required">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="provider_name">Numero Serie de Chasis</label>
                        <input class="form-control String" type="text" name="provider_name" id="provider_name" value="{{old('provider_name')}}" maxlength="60" required="required">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="provider_name">Numero Serie de Motor</label>
                        <input class="form-control String" type="text" name="provider_name" id="provider_name" value="{{old('provider_name')}}" maxlength="60" required="required">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="provider_name">Centimetros Cubicos</label>
                        <input class="form-control String" type="text" name="provider_name" id="provider_name" value="{{old('provider_name')}}" maxlength="60" required="required">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="provider_name">Tipo de Vehiculo</label>
                        <input class="form-control String" type="text" name="provider_name" id="provider_name" value="{{old('provider_name')}}" maxlength="60" required="required">
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