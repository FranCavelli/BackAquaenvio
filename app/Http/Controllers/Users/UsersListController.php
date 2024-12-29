<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class UsersListController extends Controller
{
    public function getUsers(Request $request): JsonResponse
    {
        $user = Auth::user();
        
        if (!$user) {
            return response()->json([
                'message' => 'No estás autenticado.',
                'error' => 1
            ], 200);
        }
        
        $company = $request->session()->get('company_id');

        $users = Users::getUsers($company);

        if ($users->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron usuarios para mostrar.',
                'error' => 3
            ], 200);
        }

        return response()->json($users);
    }
}
