<?php
use App\Http\Models\TipoUsuario;

function getRol($id_role){
    return TipoUsuario::where('id_user_type',$id_role)->value('description');
}
