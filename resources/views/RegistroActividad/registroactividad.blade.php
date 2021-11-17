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
<div class="table-responsive-md">
    <table class="table text-center">
        @if(count($activities))
        <thead>
        <tr>
            <th scope="col"># Guia</th>
            <th scope="col">Placa</th>
            <th scope="col">Codigo del Vehiculo</th>
            <th scope="col">Vehiculo</th>
            <th scope="col">Piloto</th>
            <th scope="col">Placa Plataforma / Gondola</th>
            <th scope="col">Plataforma / Gondola</th>
            <th scope="col">Fecha de Asignación</th>
            <th scope="col">Ruta</th>
            <th scope="col">Descripción</th>
            <th colspan="2">Opciones</th>
        </tr>
        </thead>
        @endif
        <tbody>
        @forelse($activities as $activity)
        <tr class="font-weight-bold">
            <th>{{$activity->id_activity}}</th>
            <th>{{$activity->vehicle_plate}}</th>
            <th>{{$activity->vehicle_code}}</th>
            <th>{{$activity->vehicle_brand}} {{$activity->vehicle_line}} {{$activity->vehicle_model}}</th>
            <th>{{$activity->pilot_name}} - {{$activity->pilot_license}}</th>
            <th>{{$activity->platform_plate}}</th>
            <th>{{$activity->platform_brand}} {{$activity->platform_line}} {{$activity->platform_model}}</th>
            <th>{{date('d-m-Y',strtotime($activity->created_at))}}</th>
            <th>{{$activity->origin_name}} - {{$activity->destiny_name}}</th>
            <th>{{$activity->description}}</th>
            <th><a href="#"><button type="button" class="btn btn-outline-info">Modificar</button></a></th>
            <th><button type="button" class="btn btn-outline-danger">Eliminar</button></th>
        </tr>
        @empty
        <p>No hay Actividades</p>
        @endforelse
        </tbody>
    </table>
</div>

@endsection
