<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Proveedores</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<style>
    body {
        font-family:  Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif; ;
        font-size: 14px;
        line-height: 20px;
        max-height: 100%;
        width: 100%;
        max-width: 100%;
    }
    .title{
        font-family:  Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;;
    }
    .field {
        font-size: 12px;
    }
    @page {
        margin-top: 0.5cm;
        margin-bottom: 2cm;
        margin-left: 1cm;
        margin-right: 1cm;
    }

    .separador {
        border-bottom: #3f9ae5;
        border-bottom-width: thick;
    }
    .layer1{
        margin-top: 10px;
    }
    .layer2{
        margin-top: 20px;
    }
    .bg-azul{
        background: #3f9ae5;
        height:7px;
    }
    #watermark {
        position: fixed;
        bottom:   15cm;
        opacity: 0.3;

        left:     5.5cm;
        width:    8cm;
        height:   8cm;
        z-index:  -1000;
    }
    thead:before, thead:after { display: none; }
    tbody:before, tbody:after { display: none; }
</style>
<body>
<div id="watermark">
    <img src="{{asset('img/cover-login.png')}}" height="100%" width="100%" />
</div>
<div class="row align-items-start">
    <div class="col-xs-3">
        <br><br>
        <div class="turn" style="line-height: 1px; margin-bottom: 2px;margin-top: 0">
            <b style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{date('d-m-Y',strtotime($hoy))}}</b>
        </div>
    </div>
    <div class="col-xs-6" style="margin-bottom: 1px">
        <br>
        <h2 class="text-center text-primary title" style="margin-top:20px !important;font-size: 30px;">Sistema de Logistica <br> y Transporte</h2>
        <h4 class="text-primary title">SLT, S.A.  &nbsp;  NIT: ******-*</h4>
    </div>
    <div class="col-xs-3" style="margin-bottom: 1px">
    </div>
</div>
<div class="bg-azul"></div>
<table>
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Cod. Prov</th>
        <th scope="col">Nombre</th>
        <th scope="col">NIT</th>
        <th scope="col">Dirección</th>
        <th scope="col">Email</th>
        <th scope="col">Telefono</th>
    </tr>
    </thead>
    <tbody>
    @foreach($providers as $provider)
        <tr>
            <th><b>{{$loop->iteration}}</b></th>
            <td><b>{{$provider->id_provider}}</b></td>
            <td><b>{{$provider->provider_name}}</b></td>
            <td><b>{{$provider->nit}}</b></td>
            <td><b>{{$provider->provider_address}}</b></td>
            <td><b>{{$provider->email}}</b></td>
            <td><b>{{$provider->telefono}}</b></td>
        </tr>
    @endforeach
    </tbody>
</table>
<h4 class="text-center text-primary title">Seguridad, Integridad, Eficiencia y enfoque de Servicio al Cliente</h4>

</body>
</html>
