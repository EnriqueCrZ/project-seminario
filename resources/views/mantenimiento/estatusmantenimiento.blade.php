@extends('layouts.admin')

@section('main-content')
    <h2>ESTADO DE MANTENIMIENTO</h2>

    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="mantenimiento.blade.php">MANTENIMIENTO</a>
        </li>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="estatusmantenimiento.blade.php.blade.php">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="proximosmantenimiento.blade.php">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="insumosrespuestos.blade.php">Link</a>
        </li>
    </ul>

    <button type="button" class="btn btn-primary">Crear Orden de Trabajo</button>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#OT</th>
            <th scope="col">Placa</th>
            <th scope="col">Vehiculo</th>
            <th scope="col">Solicitante</th>
            <th scope="col">Fecha Ingreso</th>
            <th scope="col">Fecha de Entrega</th>
            <th scope="col">Tipo de Mantenimiento</th>
            <th scope="col">Estatus</th>
            <th scope="col">Opciones</th>

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
            <td>activo</td>
            <td><button type="button" class="btn btn-outline-danger">Finalizar</button></td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>2343245</td>
            <td>qwaOttoM</td>
            <td>NTI</td>
            <td>Calle Marginal3</td>
            <td>admin122@admin.com</td>
            <td>Telefono</td>
            <td>activo</td>
            <td><button type="button" class="btn btn-outline-danger">Finalizar</button></td>
        </tr>


        </tbody>
    </table>
@endsection
