@extends('layouts.admin')

@section('main-content')

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link " aria-current="page" href="{{ route('mantenimiento') }}">Mantenimiento</a>
        </li>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('mantenimiento.estatus') }}">Estatus de Mantenimiento</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('mantenimiento.proximos') }}">Mantenimientos Proximos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('mantenimiento.insumo') }}">Insumos y Respuestos</a>
        </li>

    </ul>
@endsection
