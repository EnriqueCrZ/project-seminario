<?php
use App\Http\Models\TipoUsuario;
use App\User;


function getPlatformId(){
    return 4;
}

function getRol($id_role){
    return TipoUsuario::where('id_user_type',$id_role)->value('description');
}

function verificarInactividadUsuario($username)
{
    $state = User::where('email', $username)->value('is_active');
    return $state != 1;
}
