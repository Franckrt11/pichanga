<?php

namespace App\Http\Controllers\Api\Company\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyActivityLog;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class AuthenticatedController extends Controller
{
    public function register(Request $request)
    {
        if (!$request->input('checkbox')) {
            return response()->json(['status' => false, 'errors' => ['checkbox' => 'Debes aceptar los términos y condiciones.']]);
        }

        $validated = $request->validate([
            'name' => 'required|string',
            'ruc' => 'required|digits:11',
            'email' => 'required|email:rfc|unique:companies,email',
            'password' => ['required', 'string', Password::min(8), 'confirmed']
        ], $messages = [
            'name.required' => 'La razón social es requerida.',
            'name.string' => 'La razón social debe ser una cadena de caracteres.',
            'email.required' => 'El correo es requerido.',
            'email.email' => 'El correo debe ser una dirección válida.',
            'email.unique' => 'El correo ya está en uso.',
            'ruc.required' => 'El RUC es requerido.',
            'ruc.digits' => 'El RUC debe ser un número de :digits dígitos.',
            'password.required' => 'La contraseña es requerida.',
            'password.confirmed' => 'La contraseña no coincide.',
            'password.min' => 'La contraseña debe contener al menos :min caracteres.',
        ]);

        $company = Company::create([
            'name' => $request->input('name'),
            'ruc' => $request->input('ruc'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        $token = $company->createToken($request->input('device'))->plainTextToken;

        CompanyActivityLog::create([
            'message' => 'Has registrado una nueva cuenta.',
            'company_id' => $company->id
        ]);

        return response()->json(['status' => true, 'token' => $token, 'user' => $company]);
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email:rfc',
            'password' => ['required', 'string', Password::min(8)]
        ], $messages = [

            'email.required' => 'El correo es requerido.',
            'email.email' => 'El correo debe ser una dirección válida.',
            'password.required' => 'La contraseña es requerida.',
            'password.min' => 'La contraseña debe contener al menos :min caracteres.',
        ]);

        $company = Company::where('email', $request->input('email'))->first();

        if (!$company) {
            return response()->json(['status' => false, 'errors' => ['email' => 'La dirección de correo no existe.']]);
        }

        if (Hash::check($request->input('password'), $company->password)) {
            $token = $company->createToken($request->input('device'))->plainTextToken;

            CompanyActivityLog::create([
                'message' => 'Has iniciado sesión.',
                'company_id' => $company->id
            ]);

            return response()->json(['status' => true, 'token' => $token, 'user' => $company]);
        }

        return response()->json(['status' => false, 'errors' => ['password' => 'La contraseña es incorrecta.']]);
    }

    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken()->delete();
        return response()->json(['status' => true, 'token' => $token]);
    }
}
