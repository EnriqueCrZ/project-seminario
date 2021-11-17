@extends('layouts.admin')

@section('titulo')
    Registro de Actividades
@endsection

@section('main-content')

<div>
     <a href="{{route('registroactividad.crear')}}">
         <button type="button" class="btn btn-primary">Crear nuevo trabajo</button>
     </a>
 </div><br>

<table class="table text-center">
    <thead class="">
        <tr>
            <th scope="col"># Guia</th>
            <th scope="col">Placa</th>
            <th scope="col">Codigo del Vehiculo</th>
            <th scope="col">Vehiculo</th>
            <th scope="col">Piloto</th>
            <th scope="col">Placa Plataforma / Gondola</th>
            <th scope="col">Plataforma / Gondola</th>
            <th scope="col">Fecha de Asignación</th>
            <th scope="col">Tipo de Trabajo</th>
            <th scope="col">Descripción</th>
            <th colspan="2">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>128</th>
            <th>P 123ABC</th>
            <th>101</th>
            <th>Volvo FH16</th>
            <th>Carlos Perez</th>
            <th>GT-001</th>
            <th>Plataforma GT-008</th>
            <th>01/01/2021</th>
            <th>Movimiento en Terminal Portuaria</th>
            <th>Movimiento en Terminal Portuaria</th>
            <th><a href="#"><button type="button" class="btn btn-outline-info">Modificar</button></a></th>
            <th><button type="button" class="btn btn-outline-danger">Eliminar</button></th>
        </tr>
    </tbody>
</table>

@endsection
