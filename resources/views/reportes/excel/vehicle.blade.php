<table class="table text-center table-responsive-md">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Placa</th>
        <th scope="col">Marca</th>
        <th scope="col">Modelo</th>
        <th scope="col">Linea</th>
        <th scope="col">Serie Chasis</th>
        <th scope="col">Serie Motor</th>
        <th scope="col">CC</th>
        <th scope="col">Tipo de Vehiculo</th>
    </tr>
    </thead>
    <tbody>
    @foreach($vehicles as $vehiculo)
        <tr class="font-weight-bold">
            <td class="text-nowrap">{{$loop->iteration}}</td>
            <td class="text-nowrap">{{$vehiculo->plate}}</td>
            <td class="text-nowrap">{{$vehiculo->brand}}</td>
            <td class="text-nowrap">{{$vehiculo->model}}</td>
            <td class="text-nowrap">{{$vehiculo->line}}</td>
            <td class="text-nowrap">{{$vehiculo->vehicle_code}}</td>
            <td class="text-nowrap">{{$vehiculo->motor}}</td>
            <td class="text-nowrap">{{$vehiculo->cc}}</td>
            <td class="text-nowrap">{{$vehiculo->vehicle_type}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
