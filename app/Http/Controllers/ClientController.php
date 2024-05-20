<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ClientController extends Controller
{
    
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();    
            if (!empty($user->rol_usuario) && $user->rol_usuario == 'admin') {
                $users = User::all(); // Obtener todos los usuarios
                return view('admin', compact('users'));
            }
        }
        return redirect('/');
    }
    
}

