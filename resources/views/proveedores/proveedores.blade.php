@extends('layouts.admin')

@section('main-content')
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
                <button type="button" class="btn btn-outline-info">Modificar</button>
                <button type="button" class="btn btn-outline-danger">Eliminar</button>
            </td>
        </tr>
        @empty
            <p>No hay proveedores</p>
        @endforelse
        </tbody>
    </table>
@endsection
