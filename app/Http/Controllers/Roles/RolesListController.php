<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class RolesListController extends Controller
{
    public function getRoles(Request $request): JsonResponse
    {
        $user = Auth::user();
        
        if (!$user) {
            return response()->json([
                'message' => 'No estás autenticado.',
                'error' => 1
            ], 200);
        }
        
        $company = $request->session()->get('company_id');

        $roles = Roles::getRoles($company);

        if ($roles->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron roles para mostrar.',
                'error' => 3
            ], 200);
        }

        return response()->json($roles);
    }
}
