@extends('layouts.admin')

@section('titulo')
    Dashboard
@endsection
@section('main-content')

    @if (session('success'))
    <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">

        <!-- Usuarios -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ __('Usuarios') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['users'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pilotos -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{ __('Pilotos') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['pilots'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-biking fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Proveedores -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">{{ __('Proveedores') }}</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['providers'] }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="far fa-address-book fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- vehicles -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">{{ __('Productos') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['products'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-boxes fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Actividades</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-center table-bordered">
                            @if(count($activities))
                                <thead>
                                <tr>
                                    <th scope="col" class="align-middle">#Guia</th>
                                    <th scope="col" class="align-middle">Descripción</th>
                                    <th scope="col" class="align-middle">Placa Vehiculo</th>
                                    <th scope="col" class="align-middle">Placa Plataforma / Gondola</th>
                                    <th scope="col" class="align-middle">Piloto</th>
                                    <th scope="col" class="align-middle">Fecha de Asignación</th>
                                    <th scope="col" class="align-middle">Ruta</th>
                                </tr>
                                </thead>
                            @endif
                            <tbody>
                            @forelse($activities as $activity)
                                <tr class="font-weight-bold">
                                    <th>{{$activity->id_activity}}</th>
                                    <th>{{$activity->description}}</th>
                                    <th>{{$activity->vehicle_plate}}</th>
                                    <th>{{$activity->platform_plate}}</th>
                                    <th>{{$activity->pilot_name}} - {{$activity->pilot_license}}</th>
                                    <th>{{date('d-m-Y',strtotime($activity->created_at))}}</th>
                                    <th style="background-color: {{$colors[$activity->id_activity]}}"></th>
                                </tr>
                            @empty
                                <p>No hay Actividades</p>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>

        <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Localización</h6>
                </div>
                <div class="card-body" style="height: 500px; width: 100%; position: relative">
                    @include('localizacion.index')
                </div>
            </div>

            <!-- Approach
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                </div>
                <div class="card-body">
                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>
                    <p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>
                </div>
            </div>-->

        </div>
    </div>

@endsection
