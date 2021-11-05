@extends('layouts.admin')
@section('titulo')
    Vehiculos
@endsection
@section('main-content')

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col col-6 offset-4">
            <div class="form-group has-search">
                <form>
                    <div class="form-row">
                        <div class="col-8">
                            <input type="search" class="form-control" name="s" id="s"  placeholder="Marca, Modelo, Serie Chasis, Placa, Tipo de Vehiculo" value="{{$query}}">
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn text-white btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<div>
     <a href="{{route('vehiculo.crear')}}">
         <div class="btn-group">
             <button type="button" class="btn btn-outline-info">Crear Vehiculo</button>
         </div>
     </a>
 </div>
<table class="table text-center table-responsive-md">

    @if(count($vehiculos))
    <thead>
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
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    @endif
    <tbody>
    @forelse($vehiculos as $vehiculo)
        <tr class="font-weight-bold">
            <td>{{$loop->iteration}}</td>
            <td class="text-nowrap">{{$vehiculo->plate}}</td>
            <td>{{$vehiculo->brand}}</td>
            <td>{{$vehiculo->model}}</td>
            <td>{{$vehiculo->line}}</td>
            <td>{{$vehiculo->vehicle_code}}</td>
            <td>{{$vehiculo->motor}}</td>
            <td>{{$vehiculo->cc}}</td>
            <td>{{$vehiculo->vehicle_type}}</td>
            <td>
                <a href="{{route('vehiculo.edit',$vehiculo->id_vehicle)}}">
                    <button type="button" class="btn btn-outline-info"><i class="fas fa-edit"></i></button>
                </a>
                <button type="button" class="btn btn-outline-danger" onclick="confirmDelete({{$vehiculo->id_vehicle}})"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
    @empty
    <p>No hay vehiculos</p>
    @endforelse
    </tbody>
</table>
    <div class="row ml-1 d-flex justify-content-center">
        {{ $vehiculos->appends(['s'=>$query])->links() }}
    </div>
    <script>
        function confirmDelete(id){
            Swal.fire({
                title: '¿Quieres eliminar el vehiculo?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Eliminar',
                denyButtonText: `No eliminar`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '{{route('vehiculo.delete')}}',
                        data: {"id":id, "_token":'{{csrf_token()}}'},
                        success:function(data){
                            if(data){
                                Swal.fire('Eliminando...', '', 'success');
                                location.reload();
                            }else{
                                Swal.fire('Ocurrio un problema.', '', 'danger')
                            }
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire('Vehiculo no eliminado', '', 'info')
                }
            })
        }
    </script>
@endsection
