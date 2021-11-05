<table class="table table-responsive-md">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Cod. Usuario</th>
            <th scope="col">Nombre de Usuario</th>
            <th scope="col">Email</th>
            <th scope="col">Tipo de Usuario</th>
            <th scope="col">Estado</th>
        </tr>
        </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <th>{{$loop->iteration}}</th>
            <td>{{$user->id}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->tipoUsuario}}</td>
            @if($user->is_active == 1)
                <td class="text-nowrap" style="color: #38c172!important">
                    ACTIVO
                </td>
            @else
                <td class="text-nowrap" style="color: #FF5252!important">
                    INACTIVO
                </td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
