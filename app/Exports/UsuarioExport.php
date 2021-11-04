<?php

namespace App\Exports;

use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsuarioExport implements FromView
{
    public function view(): View
    {
        $users = User::join('user_type','user_type.id_user_type','user.user_type_id_user_type')
            ->select('user_type.description as tipoUsuario','user.username','user.email','user.is_active','user.id')
            ->orderBy('user.id','asc')
            ->get();

        return view('reportes.excel.users',compact('users'));
    }
}
