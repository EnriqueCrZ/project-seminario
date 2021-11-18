@extends('layouts.admin')

@section('titulo')
    Registro de Ubicaciones
@endsection

@section('main-content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif



 <div>
     <a href="{{route('ubicacion.crear')}}">
         <div class="btn-group">
             <button type="button" class="btn btn-outline-info">Crear Ubicacion</button>
         </div>
     </a>
 </div>
    <table class="table text-center table-responsive-md">
        @if(count($locations))
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Codigo de Ubicacion</th>
            <th scope="col">Nombre de la Ubicacion</th>
            <th scope="col">Latitud </th>
            <th scope="col">Logitud</th>
            <th scope="col">Opcion</th>
        </tr>
        </thead>
        @endif
        <tbody>
        @forelse($locations as $location)
        <tr class="font-weight-bold">
            <th>{{$loop->iteration}}</th>
            <td>{{$location->id_location}}</td>
            <td>{{$location->name}}</td>
            <td>{{$location->latitude}}</td>
            <td>{{$location->longitude}}</td>
            <td>
                {{--<a href="{{route('ubicacion.edit',['location'=>$location] )}}">
                    <button type="button" class="btn btn-outline-info"><i class="fas fa-edit"></i></button>
                </a>--}}
                <button type="button" class="btn btn-outline-danger" onclick="confirmDelete({{$location->id_location}})"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        @empty
            <p>No hay Ubicaciones</p>
        @endforelse
        </tbody>
    </table>
    <div class="row ml-1 d-flex justify-content-center">
        {{ $locations->links() }}
    </div>
    <script>
        function confirmDelete(id){
            Swal.fire({
                title: '¿Quieres eliminar la ubicacion?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Eliminar',
                denyButtonText: `No eliminar`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '{{route('ubicacion.delete')}}',
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
                    Swal.fire('La ubicacion no se elimino', '', 'info')
                }
            })
        }
    </script>
@endsection
