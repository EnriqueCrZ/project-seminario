@extends('layouts.admin')

@section('titulo')
    Registro de Pilotos
@endsection

@section('main-content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif



 <div>
     <a href="{{route('piloto.crear')}}">
         <div class="btn-group">
             <button type="button" class="btn btn-outline-info">Crear Piloto</button>
         </div>
     </a>
 </div>
    <table class="table text-center table-responsive-md">
        @if(count($pilot))
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Codigo Piloto</th>
            <th scope="col">Nombre</th>
            <th scope="col">Licencia</th>
            <th scope="col">Dirección</th>
            <th scope="col">Telefono</th>
            <th scope="col">Opcion</th>
        </tr>
        </thead>
        @endif
        <tbody>
        @forelse($pilot as $pilot)
        <tr class="font-weight-bold">
            <th>{{$loop->iteration}}</th>
            <td>{{$pilot->id_pilot}}</td>
            <td>{{$pilot->provider_name}}</td>
            <td>{{$pilot->license}}</td>
            <td>{{$pilot->address}}</td>
            <td>{{$pilot->phone_number}}</td>
            <td>
                <a href="{{route('pilot.edit',['piloto'=>$pilot] )}}">
                    <button type="button" class="btn btn-outline-info"><i class="fas fa-edit"></i></button>
                </a>
                <button type="button" class="btn btn-outline-danger" onclick="confirmDelete({{$pilot->id_pilot}})"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        @empty
            <p>No hay pilotos</p>
        @endforelse
        </tbody>
    </table>
    <div class="row ml-1 d-flex justify-content-center">
        {{ $pilot->links() }}
    </div>
    <script>
        function confirmDelete(id){
            Swal.fire({
                title: '¿Quieres eliminar el piloto?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Eliminar',
                denyButtonText: `No eliminar`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '{{route('piloto.delete')}}',
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
                    Swal.fire('Piloto no eliminado', '', 'info')
                }
            })
        }
    </script>
@endsection
