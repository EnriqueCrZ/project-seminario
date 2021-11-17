@extends('layouts.admin')
@section('titulo')
     Mantenimiento
@endsection
@section('main-content')


    <ul class="nav nav-tabs">



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


                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-secondary" onclick="openModal3()" >
                        Ingresar Producto
                    </button>
                    <div class="modal3">
                    </div>
                    <button type="button" class="btn btn-outline-info">Buscar Producto</button>
                <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-danger" onclick="openModal4()" >
                      Retirar Producto
                    </button>
                    <div class="modal4">
                    </div>
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
    <script>
        function openModal3(){
            $.ajax({
                type: 'POST',
                url: '{{route('modal.mantenimientoProducto')}}',
                data: {'_token': '{{csrf_token()}}'},
                success: function (data){
                    $('.modal3').html(data);
                    $('#modalMantenimientoProducto').modal();
                }
            });
        }
        function openModal4(){
            $.ajax({
                type: 'POST',
                url: '{{route('modal.mantenimientoRetirar')}}',
                data: {'_token': '{{csrf_token()}}'},
                success: function (data){
                    $('.modal4').html(data);
                    $('#modalMantenimientoRetirar').modal();
                }
            });
        }
    </script>
@endsection
