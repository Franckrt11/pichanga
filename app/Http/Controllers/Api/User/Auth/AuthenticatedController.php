<?php

namespace App\Http\Controllers\Api\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserActivityLog;
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
            'lastname' => 'required|string',
            'email' => 'required|email:rfc|unique:users,email',
            'phone' => 'required|digits:9',
            'district' => 'required|string',
            'password' => ['required', 'string', Password::min(8), 'confirmed']
        ], $messages = [
            'name.required' => 'El nombre es requerido.',
            'name.string' => 'El nombre debe ser una cadena de caracteres.',
            'lastname.required' => 'Los apellidos son requeridos.',
            'lastname.string' => 'Los apellidos deben ser una cadena de caracteres.',
            'email.required' => 'El correo es requerido.',
            'email.email' => 'El correo debe ser una dirección válida.',
            'email.unique' => 'El correo ya está en uso.',
            'phone.required' => 'El número de celular es requerido.',
            'phone.digits' => 'El celular debe ser un número de :digits dígitos.',
            'district.required' => 'El distrito es requerido.',
            'district.string' => 'El distrito debe ser una cadena de caracteres.',
            'password.required' => 'La contraseña es requerida.',
            'password.confirmed' => 'La contraseña no coincide.',
            'password.min' => 'La contraseña debe contener al menos :min caracteres.',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'district' => $request->input('district'),
            'password' => Hash::make($request->input('password'))
        ]);

        $token = $user->createToken($request->input('device'))->plainTextToken;

        UserActivityLog::create([
            'message' => 'Has registrado una nueva cuenta.',
            'user_id' => $user->id
        ]);

        return response()->json(['status' => true, 'token' => $token, 'user' => $user]);
    }

    public function login(Request $request)
    {
        $rules = ['password' => ['required', 'string', Password::min(8)]];

        $messages = [
            'username.required' => 'El usuario es requerido.',
            'password.required' => 'La contraseña es requerida.',
            'password.min' => 'La contraseña debe contener al menos :min caracteres.',
        ];

        if (preg_match('/^[0-9]+$/', $request->input('username'))) {
            $rules['username'] = 'required|digits:9';
            $messages['username.digits'] = 'El celular debe ser un número de :digits dígitos.';
            $auth = ['field' => 'phone', 'fail' => 'El número de celular no existe.'];
        } else {
            $rules['username'] = 'required|email:rfc';
            $messages['username.email'] = 'El usuario debe ser una dirección de correo válida.';
            $auth = ['field' => 'email', 'fail' => 'La dirección de correo no existe.'];
        }

        $validated = $request->validate($rules, $messages);

        $user = User::where($auth['field'], $request->input('username'))->first();

        if (!$user) {
            return response()->json(['status' => false, 'errors' => ['username' => $auth['fail']]]);
        }

        if (Hash::check($request->input('password'), $user->password)) {
            $token = $user->createToken($request->input('device'))->plainTextToken;

            UserActivityLog::create([
                'message' => 'Has iniciado sesión.',
                'user_id' => $user->id
            ]);

            return response()->json(['status' => true, 'token' => $token, 'user' => $user]);
        }

        return response()->json(['status' => false, 'errors' => ['password' => 'La contraseña es incorrecta.']]);
    }

    public function googlelogin(Request $request)
    {
        $user = User::where('google_id', $request->input('google_id'))->first();

        $activity = 'Has iniciado sesión con Google.';

        if (!$user) {
            $user = User::create([
                'name' => $request->input('name'),
                'lastname' => $request->input('lastname'),
                'email' => $request->input('email'),
                'google_id' => $request->input('google_id')
            ]);

            $activity = 'Has registrado una nueva cuenta.';
        }

        $token = $user->createToken($request->input('device'))->plainTextToken;

        UserActivityLog::create([
            'message' => $activity,
            'user_id' => $user->id
        ]);

        return response()->json(['status' => true, 'token' => $token, 'user' => $user]);
    }

    public function facebooklogin(Request $request)
    {
        $user = User::where('facebook_id', $request->input('facebook_id'))->first();

        $activity = 'Has iniciado sesión con Google.';

        if (!$user) {
            $user = User::create([
                'name' => $request->input('name'),
                'lastname' => $request->input('lastname'),
                'email' => $request->input('email'),
                'facebook_id' => $request->input('facebook_id')
            ]);

            $activity = 'Has registrado una nueva cuenta.';
        }

        $token = $user->createToken($request->input('device'))->plainTextToken;

        UserActivityLog::create([
            'message' => $activity,
            'user_id' => $user->id
        ]);

        return response()->json(['status' => true, 'token' => $token, 'user' => $user]);
    }

    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken()->delete();
        return response()->json(['status' => true, 'token' => $token]);
    }
}
