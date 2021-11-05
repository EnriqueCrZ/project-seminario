<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuarios {{date('m-d-Y',strtotime($hoy))}}</title>

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
                <img src="{{asset('img/pdf-cover.png')}}" alt="Logo" width="100px" class="logo"/>
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
    <h3>Usuarios</h3>
    <table width="100%">
        <thead class="table-header">
        <tr>
            <th>Cod. Usuario</th>
            <th>Nombre de Usuario</th>
            <th>Email</th>
            <th>Tipo de Usuario</th>
            <th>Estado</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr style="margin-left: 5px!important;">
                <td>{{$user->id}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->tipoUsuario}}</td>
                @if($user->is_active == 1)
                    <td style="color: #38c172!important">
                        ACTIVO
                    </td>
                @else
                    <td style="color: #FF5252!important">
                        INACTIVO
                    </td>
                @endif
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
