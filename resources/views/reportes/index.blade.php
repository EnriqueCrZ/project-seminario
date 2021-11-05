@extends('layouts.admin')

@section('styles')
    <link href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/smart_wizard.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/smart_wizard_theme_arrows.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/jquery.smartWizard.min.js"></script>
    <script src="{{asset('js/formReport.js')}}"></script>
@endsection

@section('titulo')
    Generación de Reportes
@endsection
@section('main-content')
<link rel="stylesheet" href="{{asset('css/reports.css')}}">
{{-- Contenido --}}
<div class="p-5 m-5">
    <button onclick="resetWizard()" class="btn-outline-info btn">Nuevo Reporte</button>
    <form id="formReport">
        <div id="smartwizard">
            <ul>
                <li><a href="#step-1">Paso 1<br /><small>Seleccionar Contenido</small></a></li>
                <li><a href="#step-2">Paso 2<br /><small>Tipo de Exportación</small></a></li>
                <li><a href="#step-3">Paso 3<br /><small>Generación de Reporte</small></a></li>
                <li><a href="#step-4">Paso 4<br /><small>Descarga de Archivo</small></a></li>
            </ul>
            <div class="mt-4">
                <div id="step-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 offset-3">
                                    <select class="form-select form-control" aria-label="Default" id="collection" name="collection">
                                        <option value="0">Vehiculos</option>
                                        <option value="1">Usuarios</option>
                                        <option value="2">Proveedores</option>
                                        <option value="3">Mantenimiento</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="step-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 offset-3">
                                    <select class="form-select form-control" aria-label="Default" id="exportType" name="exportType">
                                        <option value="1">Excel</option>
                                        <option value="2">PDF</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="step-3" class="">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 offset-3">
                                    <div class="loader">Loading...</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="step-4" class="">
                    <div class="row">
                        <div class="col-md-12"> <button id="downloadButton" type="button" class="btn btn-success" >Descargar <i class="fas fa-cloud-download-alt"></i></button> </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>

{{-- Script --}}

@endsection
