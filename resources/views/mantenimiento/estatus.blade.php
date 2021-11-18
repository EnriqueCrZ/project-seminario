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


<div class="table-responsive">

</div>
    <table class="table text-center table-responsive-md">
        @if(count($mantenimientos))
            <thead>
            <tr>
                <th scope="col">#OT</th>
                <th scope="col">Placa</th>
                <th scope="col">Vehiculo</th>
                <th scope="col">Solicitante</th>
                <th scope="col">Fecha Ingreso</th>
                <th scope="col">Fecha Entrega</th>
                <th scope="col">Tipo de Mantenimiento</th>
                <th scope="col">Estatus</th>
                <th scope="col">Opcion</th>
            </tr>
            </thead>
        @endif
        <tbody>
        @forelse($mantenimientos as $m)
            <tr class="font-weight-bold">
                <th>{{$m->service_number}}</th>
                <td>{{$m->plate}}</td>
                <td>{{$m->brand}} {{$m->line}} {{$m->model}}</td>
                <td>{{$m->service_responsable}}</td>
                <td>{{date('d-m-Y',strtotime($m->start_date))}}</td>
                <td>{{date('d-m-Y',strtotime($m->service_date))}}</td>
                <td>{{$m->description}}</td>
                @if($m->status == 1)
                    <td>Activo</td>
                @else
                    <td>Inactivo</td>
                @endif
                <td>
                    {{--<a href="#">
                        <button type="button" class="btn btn-outline-info"><i class="fas fa-edit"></i></button>
                    </a>--}}
                    @if($m->status == 1)
                        <button type="button" class="btn btn-outline-danger" onclick="changeStatus('{{$m->id_maintenance}}',0)">DESACTIVAR</button>
                    @else
                        <button type="button" class="btn btn-outline-success" onclick="changeStatus('{{$m->id_maintenance}}',1)">ACTIVAR</button>
                    @endif
                </td>
            </tr>
        @empty
            <p>No hay mantenimientos</p>
        @endforelse
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

        function saveMant(){
            let data = $('#formMant').serialize();

            $.ajax({
                type: 'POST',
                url: '{{route('mantenimiento.guardar')}}',
                data: data,
                success:function(data){
                    console.log(data);
                    if(data){
                        Swal.fire('Guardando...', '', 'success');
                        location.reload();
                    }else{
                        console.log(data)
                        Swal.fire('Ocurrio un problema.', '', 'danger')
                    }
                }
            });
        }

        function changeStatus(id,status){
            Swal.fire({
                title: 'Confirmar Accion',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Si',
                denyButtonText: `No`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '{{route('mantenimiento.status.change')}}',
                        data: {"id":id, "_token":'{{csrf_token()}}',"status":status},
                        success:function(data){
                            if(data){
                                Swal.fire('Desactivando...', '', 'success');
                                location.reload();
                            }else{
                                Swal.fire('Ocurrio un problema.', '', 'danger')
                            }
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire('Mantenimiento no desactivado', '', 'info')
                }
            })
        }
    </script>

@endsection
