<?php

namespace App\Http\Controllers\Api\Company\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyActivityLog;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'new_password' => ['required', 'string', Password::min(8), 'confirmed']
        ], $messages = [
            'email.required' => 'El correo es requerido.',
            'email.email' => 'El correo debe ser una dirección válida.',
            'password.required' => 'La contraseña es requerida.',
            'new_password.required' => 'La contraseña nueva es requerida.',
            'new_password.confirmed' => 'La contraseña nueva no coincide.',
            'new_password.min' => 'La contraseña nueva debe contener al menos :min caracteres.',
        ]);

        $company = Company::where('email', $request->input('email'))->first();


        if (!Hash::check($request->input('password'), $company->password)) {
            return response()->json(['status' => false, 'errors' => ['password' => ['La contraseña actual es incorrecta.']]]);
        } else {
            $company->password = Hash::make($request->input('new_password'));

            CompanyActivityLog::create([
                'message' => 'Has cambiado la contraseña.',
                'company_id' => $company->id
            ]);

            return response()->json(['status' => true]);
        }
    }
}
