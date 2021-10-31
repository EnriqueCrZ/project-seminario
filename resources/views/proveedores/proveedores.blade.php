@extends('layouts.admin')

@section('main-content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

 <h2>REGISTRO DE PROVEEDORES</h2>



 <div>
     <a href="{{route('proveedor.crear')}}">
         <button type="button" class="btn btn-primary">Crear</button>
     </a>
 </div>
    <table class="table">
        @if(count($providers))
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Cod. Prov</th>
            <th scope="col">Nombre</th>
            <th scope="col">NIT</th>
            <th scope="col">Dirección</th>
            <th scope="col">Email</th>
            <th scope="col">Telefono</th>
            <th scope="col">Opcion</th>
        </tr>
        </thead>
        @endif
        <tbody>
        @forelse($providers as $provider)
        <tr>
            <th>{{$loop->iteration}}</th>
            <td>{{$provider->id_provider}}</td>
            <td>{{$provider->provider_name}}</td>
            <td>{{$provider->nit}}</td>
            <td>{{$provider->provider_address}}</td>
            <td>{{$provider->email}}</td>
            <td>{{$provider->telefono}}</td>
            <td>
                <a href="{{route('proveedor.edit',['proveedor'=>$provider] )}}">
                    <button type="button" class="btn btn-outline-info"><i class="fas fa-edit"></i></button>
                </a>
                <button type="button" class="btn btn-outline-danger" onclick="confirmDelete({{$provider->id_provider}})"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        @empty
            <p>No hay proveedores</p>
        @endforelse
        </tbody>
    </table>
    <script>
        function confirmDelete(id){
            Swal.fire({
                title: '¿Quieres eliminar el proveedor?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Eliminar',
                denyButtonText: `No eliminar`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '{{route('proveedor.delete')}}',
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
                    Swal.fire('Proveedor no eliminado', '', 'info')
                }
            })
        }
    </script>
@endsection
