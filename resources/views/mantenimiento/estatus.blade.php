@extends('layouts.admin')
@section('titulo')
    Mantenimiento
@endsection
@section('main-content')


    <ul class="nav nav-tabs">

        <li class="nav-item">
            <a class="nav-link active" href="{{ route('mantenimiento.estatus') }}">Estatus de Mantenimiento</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('mantenimiento.proximos') }}">Mantenimientos Proximos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('mantenimiento.insumo') }}">Insumos y Respuestos</a>
        </li>
        <li>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="btn-group">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-secondary" onclick="openModal()" >
                    Crear Orden De Trabajo
                </button>
                <div class="modal1">
                </div>
                <button type="button" class="btn btn-outline-info">Buscar Orden de Trabajo</button>

            </div>

        </li>

    </ul>



    <table class="table">
        <thead>
        <tr>
            <th scope="col">#OT</th>
            <th scope="col">Placa</th>
            <th scope="col">Vehiculo</th>
            <th scope="col">Solicitante</th>
            <th scope="col">Fecha Ingreso</th>
            <th scope="col">Fecha de Entrega</th>
            <th scope="col">Tipo de Mantenimiento</th>
            <th scope="col">Estatus</th>
            <th scope="col">Opciones</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>126456</td>
            <td>OttoM</td>
            <td>NTI</td>
            <td>Calle Marginal</td>
            <td>admin@admin.com</td>
            <td>Preventivo</td>
            <td>activo</td>
            <td><button type="button" class="btn btn-outline-danger">Finalizar</button></td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>2343245</td>
            <td>qwaOttoM</td>
            <td>NTI</td>
            <td>Calle Marginal3</td>
            <td>admin122@admin.com</td>
            <td>Correctivo</td>
            <td>activo</td>
            <td><button type="button" class="btn btn-outline-danger">Finalizar</button></td>
        </tr>


        </tbody>
    </table>
    <script>
        function openModal(){
            $.ajax({
                type: 'POST',
                url: '{{route('modal.mantenimiento')}}',
                data: {'_token': '{{csrf_token()}}'},
                success: function (data){
                    $('.modal1').html(data);
                    $('#modalMantenimiento').modal();
                }
            });
        }
    </script>

@endsection
