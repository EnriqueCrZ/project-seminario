@extends('layouts.admin')

@section('main-content')

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Usuarios') }}</h1>

    <div class="row">
        <div class="col col-6 offset-4">
            <div class="form-group has-search">
                <form>
                    <div class="form-row">
                        <div class="col-8">
                            <input type="search" class="form-control" name="s" id="s"  placeholder="mail@example.com" value="{{$query}}">
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
        <a href="{{route('usuarios.crear')}}">
            <button type="button" class="btn btn-primary">Crear</button>
        </a>
    </div>
    <table class="table table-responsive-md">
        @if(count($users))
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Cod. Usuario</th>
                <th scope="col">Nombre de Usuario</th>
                <th scope="col">Email</th>
                <th scope="col">Tipo de Usuario</th>
                <th scope="col">Estado</th>
                <th scope="col">Opcion</th>
            </tr>
            </thead>
        @endif
        <tbody>
        @forelse($users as $user)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>{{$user->id}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->tipoUsuario}}</td>
                @if($user->is_active == 1)
                    <td class="text-nowrap" style="color: #38c172!important">
                        ACTIVO
                    </td>
                @else
                    <td class="text-nowrap" style="color: #FF5252!important">
                        INACTIVO
                    </td>
                @endif
                <td>
                    <a href="{{route('usuarios.editar',$user->id)}}">
                        <button type="button" class="btn btn-outline-info"><i class="fas fa-edit"></i></button>
                    </a>
                    @if($user->is_active == 1)
                        <button type="button" class="btn btn-outline-danger" onclick="changeStatus('{{$user->id}}',0)">DESACTIVAR</button>
                    @else
                        <button type="button" class="btn btn-outline-success" onclick="changeStatus('{{$user->id}}',1)">ACTIVAR</button>
                    @endif
                </td>
            </tr>
        @empty
            <p>No hay usuarios.</p>
        @endforelse
        </tbody>
    </table>
    <div class="row ml-1 d-flex justify-content-center">
        {{ $users->appends(['s'=>$query])->links() }}
    </div>
    <script>
        function changeStatus(id,status){
            let message = status === 1 ? 'activar' : 'desactivar';
            Swal.fire({
                title: '¿Quieres '+message+' el usuario?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Si',
                denyButtonText: `No`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '{{route('usuarios.estatus')}}',
                        data: { "_token":'{{csrf_token()}}',"id":id,"status":status},
                        success:function(data){
                            if(data){
                                Swal.fire('Actualizando...', '', 'success');
                                location.reload();
                            }else{
                                Swal.fire('Ocurrio un problema.', '', 'danger')
                            }
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire('Operación Cancelada', '', 'info')
                }
            })
        }
    </script>
@endsection
