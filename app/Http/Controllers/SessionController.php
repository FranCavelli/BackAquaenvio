<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    // Establezco un valor de la sesión
    public function store(Request $request)
    {       
        $validated = $request->validate([
            'key' => 'required|string', 
            'value' => 'required|string',
        ]);

        $request->session()->put($validated['key'], $validated['value']);

        return response()->json([
            'message' => 'Session value has set successfully',
            'error' => 0,
        ]);
    }

    // Obtener un valor de la sesión
    public function show(Request $request)
    {
        $validated = $request->validate([
            'key' => 'required|string', 
        ]);

        $value = $request->session()->get($validated['key']);

        return response()->json([
            'message' => $value,
            'error' => 0,
        ]);
    }

    // Obtener todos los valores de la sesión
    public function showAll(Request $request)
    {

        $session = $request->session()->all();

        return response()->json([
            'data' => $session,
            'error' => 0,
        ]);
    }

    // Eliminar un valor específico de la sesión
    public function delete(Request $request)
    {
        $validated = $request->validate([
            'key' => 'required|string', 
        ]);

        $request->session()->forget($validated['key']);

        return response()->json([
            'message' => 'Session value has removed',
            'error' => 0,
        ]);
    }
}
