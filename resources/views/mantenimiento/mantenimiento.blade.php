@extends('layouts.admin')

@section('main-content')

    <h1>Mantenimiento</h1>

    <ul class="nav nav-tabs">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('mantenimiento.estatus') }}">Estatus de Mantenimiento</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('mantenimiento.proximos') }}">Mantenimientos Proximos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('mantenimiento.insumo') }}">Insumos y Respuestos</a>
        </li>

    </ul>


@endsection
