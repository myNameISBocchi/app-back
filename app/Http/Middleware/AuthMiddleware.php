<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$rolePermisos): Response
    {
        $key = '7f8c9d2e1a5b6c3d4e0f9a8b7c6d5e4f3a2b1c0d9e8f7a6b5c4d3e2f1a0b9c8d';
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json([
                'error' => 1,
                'msg' => 'Token no proporcionado, por favor inicie session'
            ], 401);
        }

        try {
            $decoded = JWT::decode($token, new Key($key, 'HS256'));

            $personRol = (array) ($decoded->user->roles ?? []);

            $rolePermisos = array_map('trim', $rolePermisos);

            if (empty($rolePermisos)) {
                return $next($request);
            }

        
            $hasAccess = !empty(array_intersect($personRol, $rolePermisos));

            if (!$hasAccess) {
                return response()->json([
                    'error' => 1,
                    'msg' => 'Acceso denegado. No tienes el rango necesario.',
                    'permisos_requeridos' => $rolePermisos
                ], 403);
            }

          
            $request->attributes->add(['auth_user' => $decoded->user]);
            return $next($request);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 1,
                'msg' => 'Sesión inválida o expirada',
                'detalle' => $e->getMessage()
            ], 401);
        }
    }
}