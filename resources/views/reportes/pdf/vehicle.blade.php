<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Vehiculos {{date('m-d-Y',strtotime($hoy))}}</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }

        body {
            margin: 0px;
        }

        * {
            font-family: Verdana, Arial, sans-serif;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .invoice table {
            margin: 15px;
        }

        .invoice h3 {
            margin-left: 15px;
        }

        .invoice .table-header tr th {
            text-align: center;
        }

        .information {
            background-color: #4e73df;
            color: #FFF;
        }

        .information .logo {
            margin: 5px;
        }

        .information table {
            padding: 10px;
        }

        #watermark {
            position: fixed;
            bottom: 15cm;
            opacity: 0.3;

            left: 5.5cm;
            width: 8cm;
            height: 8cm;
            z-index: -1000;
        }
    </style>

</head>
<body>
<div id="watermark">
    <img src="{{asset('img/cover-login.png')}}" height="100%" width="100%"/>
</div>
<div class="information">
    <table width="100%">
        <tr>
            <td align="left" style="width: 40%;">
                <h3></h3>
                <pre>

<br/><br/>
Fecha: {{date('d-m-Y',strtotime($hoy))}}
</pre>


            </td>
            <td align="center">
                <img src="{{asset('img/pdf-cover.png')}}" alt="Logo" width="100" class="logo"/>
            </td>
            <td align="right" style="width: 40%;">

                <h3>Sistema de Logística y Transporte</h3>
                <pre>
                    https://sistemalt.com

                    20 Calle
                    Puerto Barrios, Izabal
                    Guatemala
                </pre>
            </td>
        </tr>

    </table>
</div>


<br/>

<div class="invoice">
    <h3>Vehiculos</h3>
    <table width="100%">
        <thead class="table-header">
        <tr>
            <th>Placa</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Linea</th>
            <th>Serie Chasis</th>
            <th>Serie Motor</th>
            <th>CC</th>
            <th>Tipo de Vehiculo</th>
        </tr>
        </thead>
        <tbody>
        @foreach($vehicles as $vehiculo)
            <tr style="margin-left: 5px!important;">
                <td>{{$vehiculo->plate}}</td>
                <td>{{$vehiculo->brand}}</td>
                <td>{{$vehiculo->model}}</td>
                <td>{{$vehiculo->line}}</td>
                <td>{{$vehiculo->vehicle_code}}</td>
                <td>{{$vehiculo->motor}}</td>
                <td>{{$vehiculo->cc}}</td>
                <td>{{$vehiculo->vehicle_type}}</td>
            </tr>
        @endforeach
    </table>
</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} {{ config('app.url') }} - All rights reserved.
            </td>
            <td align="right" style="width: 50%;">
                Eficiencia y Enfoque a la Logística.
            </td>
        </tr>

    </table>
</div>
</body>
</html>
