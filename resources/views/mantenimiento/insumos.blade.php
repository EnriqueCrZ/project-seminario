@extends('layouts.admin')

@section('main-content')




    <ul class="nav nav-tabs">

        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('mantenimiento') }}">Mantenimiento</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('mantenimiento.estatus') }}">Estatus de Mantenimiento</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('mantenimiento.proximos') }}">Mantenimientos Proximos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page"  href="{{ route('mantenimiento.insumo') }}">Insumos y Respuestos</a>

        </li>
        <li>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="btn-group">
                <button type="button" class="btn btn-outline-secondary">Ingresar Producto</button>
                <button type="button" class="btn btn-outline-info">Buscar Producto</button>
                <button type="button" class="btn btn-outline-danger">Retirar Producto</button>
            </div>

        </li>

    </ul>



    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Producto</th>
            <th scope="col">Marca</th>
            <th scope="col">Stock</th>
            <th scope="col">UM</th>
            <th scope="col">Codigo de Producto</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Selenoide de 42mt</td>
            <td>DelcoRemy</td>
            <td>12</td>
            <td>a8sdasd</td>
            <td>95e2</td>


        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Plumilla de Click 18 pul</td>
            <td>Bosh</td>
            <td>19</td>
            <td>96qfd1</td>
            <td>ianf4f</td>
        </tr>


        </tbody>
    </table>

@endsection
