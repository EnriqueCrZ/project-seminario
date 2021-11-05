<table class="table text-center table-responsive-md">
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
        <tr class="font-weight-bold">
            <th>{{$loop->iteration}}</th>
            <td>{{$provider->id_provider}}</td>
            <td>{{$provider->provider_name}}</td>
            <td>{{$provider->nit}}</td>
            <td>{{$provider->provider_address}}</td>
            <td>{{$provider->email}}</td>
            <td>{{$provider->telefono}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
