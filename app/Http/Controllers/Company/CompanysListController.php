<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class CompanysListController extends Controller
{
    public function listByUser(Request $request): JsonResponse
    {
        $user = Auth::user();
        
        if (!$user) {
            return response()->json([
                'message' => 'No estás autenticado.',
                'error' => 1
            ], 200);
        }

        $userId = $user->id;
        
        $companies = Company::getCompaniesByUser($userId);

        if ($companies->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron empresas para este usuario.',
                'error' => 2
            ], 200);
        }

        return response()->json($companies);
    }
}
