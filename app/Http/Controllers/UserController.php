<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Agrega esta línea para importar el modelo User

class UserController extends Controller
{
    public function destroy(User $user)
    {
        // Verificar si el usuario tiene permisos para eliminar
        // Aquí puedes agregar lógica para verificar los permisos de usuario si es necesario

        // Eliminar el usuario
        $user->delete();

        return redirect()->back()->with('success', 'Usuario eliminado exitosamente');
    }
}
