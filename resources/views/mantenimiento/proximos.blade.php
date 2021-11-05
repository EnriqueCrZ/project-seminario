@extends('layouts.admin')

@section('main-content')

    <h1>Mantenimiento</h1>

    <ul class="nav nav-tabs">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('mantenimiento.estatus') }}">Estatus de Mantenimiento</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('mantenimiento.proximos') }}">Mantenimientos Proximos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('mantenimiento.insumo') }}">Insumos y Respuestos</a>
        </li>
        <li>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="btn-group">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-secondary" onclick="openModal()" >
                    Programar Mantenimiento
                </button>
                <div class="modal2">
                </div>

                <button type="button" class="btn btn-outline-info">Buscar Mantenimiento</button>

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
            <th scope="col">Opciones</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>126456</td>
            <td>796bbh</td>
            <td>asdgs</td>
            <td>Willy Mallorga</td>
            <td><button type="button" class="btn btn-outline-danger">Cancelar Mantenimiento</button></td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>12342</td>
            <td>799fbb</td>
            <td>asdgs</td>
            <td>Francopaskdn</td>
            <td><button type="button" class="btn btn-outline-danger">Cancelar Mantenimiento</button></td>
        </tr>


        </tbody>
    </table>
    <script>
        function openModal(){
            $.ajax({
                type: 'POST',
                url: '{{route('modal.mantenimientoProgramar')}}',
                data: {'_token': '{{csrf_token()}}'},
                success: function (data){
                    $('.modal2').html(data);
                    $('#modalMantenimientoProgramar').modal();
                }
            });
        }
    </script>

@endsection
