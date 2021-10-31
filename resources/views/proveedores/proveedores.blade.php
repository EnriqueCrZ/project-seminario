@extends('layouts.admin')

@section('main-content')
 <h2>REGISTRO DE PROVEEDORES</h2>



 <button type="button" class="btn btn-primary">Crear Proveedores</button>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Cod. Prov</th>
            <th scope="col">Nombre</th>
            <th scope="col">NIT</th>
            <th scope="col">Dirrección</th>
            <th scope="col">Email</th>
            <th scope="col">Telefono</th>
            <th scope="col">Opcion</th>
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
            <td>Telefono</td>
            <td>
                <button type="button" class="btn btn-outline-info">Modificar</button>
                <button type="button" class="btn btn-outline-danger">Eliminar</button>
            </td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>2343245</td>
            <td>qwaOttoM</td>
            <td>NTI</td>
            <td>Calle Marginal3</td>
            <td>admin122@admin.com</td>
            <td>Telefono</td>
            <td>
                <button type="button" class="btn btn-outline-info">Modificar</button>
                <button type="button" class="btn btn-outline-danger">Eliminar</button>
            </td>
        </tr>


        </tbody>
    </table>
@endsection
