@extends('layouts.admin')

@section('main-content')


<h2>REGISTRO DE VEHICULOS</h2><br>
<table class="table text-center">
    <thead class="">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Placa</th>
            <th scope="col">Marca</th>
            <th scope="col">Modelo</th>
            <th scope="col">Linea</th>
            <th scope="col">Serie Chasis</th>
            <th scope="col">Serie Motor</th>
            <th scope="col">CC</th>
            <th scope="col">Tipo de Vehiculo</th>
            <th colspan="2">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>1</th>
            <th>P 123ABC</th>
            <th>Toyota</th>
            <th>2006</th>
            <th>Corolla</th>
            <th>11111111111111111111111111</th>
            <th>22222222222222222222222222</th>
            <th>1800</th>
            <th>Sedan</th>
            <th><button type="button" class="btn btn-outline-info">Modificar</button></th>
            <th><button type="button" class="btn btn-outline-danger">Eliminar</button></th>
        </tr>
    </tbody>
</table>

@endsection