@extends('layouts.admin')

@section('titulo')
    Inventario
@endsection

@section('main-content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif



 <div>
     <a href="{{route('inventario.crear')}}">
         <div class="btn-group">
             <button type="button" class="btn btn-outline-info">Ingresar Producto</button>
         </div>
     </a>
 </div>
    <table class="table text-center table-responsive-md">
        @if(count($inventory))
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Cod. Producto</th>
            <th scope="col">Producto</th>
            <th scope="col">Precio</th>
            <th scope="col">Marca</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Proveedor</th>
            <th scope="col">Opcion</th>
        </tr>
        </thead>
        @endif
        <tbody>
        @forelse($inventory as $inventory)
        <tr class="font-weight-bold">
            <th>{{$loop->iteration}}</th>
            <td>{{$inventory->id_inventory}}</td>
            <td>{{$inventory->product_code}}</td>
            <td>{{$inventory->spare_part}}</td>
            <td>{{$inventory->price}}</td>
            <td>{{$inventory->branch}}</td>
            <td>stock</td>
            <td>{{$inventory->provider_id_provider}}</td>

            <td>
                <a href="{{route('$inventory.edit',['inventory'=>$inventory] )}}">
                    <button type="button" class="btn btn-outline-info"><i class="fas fa-edit"></i></button>
                </a>
                <button type="button" class="btn btn-outline-danger" onclick="confirmDelete({{$inventory->id_inventory}})"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        @empty
            <p>No hay productos</p>
        @endforelse
        </tbody>
    </table>
    <div class="row ml-1 d-flex justify-content-center">
        {{ $inventory->links() }}
    </div>
    <script>
        function confirmDelete(id){
            Swal.fire({
                title: '¿Quieres eliminar el producto?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Eliminar',
                denyButtonText: `No eliminar`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '{{route('producto.delete')}}',
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
                    Swal.fire('Producto no eliminado', '', 'info')
                }
            })
        }
    </script>
@endsection
