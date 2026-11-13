<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;

class LoginControler extends Controller
{
     public function login(Request $request)
    {
        $usuario = User::where('email', $request->email)->first();
       
        if ($usuario == null) {
            return response()->json([
                'mensaje' => 'usuario invalido',
            ], 400);
        }
        if (Hash::check($request->password, $usuario->password)) {
            $key=env('JWT_SECRET');
            $algoritmo=env('JWT_ALGORITHM');
            $time = time();
            $payload = array(
                'iat' => $time,
                'exp' => $time + (24*60*60),
                'data' => [
                    'user_id' => $usuario->id,
                    'email' => $usuario->email,
                    'name' => $usuario->name,
                    'role' => $usuario->role
                ],
            );
          $jwt = JWT::encode($payload,   $key, $algoritmo);
          
            return response()->json([
                'mensaje' => 'usuario autenticado',
                        'token' => $jwt,
                        'type' => 'bearer',
                        'expires' => $time + (24*60*60),
                        'usuario' => $usuario
            ], 200);
        } else {
            return response()->json([
                'mensaje' => 'contraseña invalida',
                'status' => 400
            ], 400);
        }

    }
}
