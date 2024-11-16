<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class CompanyCreateController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'id' => ['required', 'max:255', 'unique:'.Company::class],
            'name' => ['required', 'string', 'max:255'],
        ]);

        $company = Company::create([
            'id' => (string)Str::uuid(), 
            'name' => $request->name,
        ]);

        event(new Registered($company));

        Auth::login($company);

        return response()->noContent();
    }
    
}
