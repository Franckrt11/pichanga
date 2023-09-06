<?php

namespace App\Helper;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class AuthService {

    public $dataRequest;

    public function __construct($data)
    {
        $this->dataRequest = $data;
    }

    public function validateInput($table, $auth = false)
    {
        $validatorMaker = [
            'email' => $this->dataRequest['email'],
            'password' => $this->dataRequest['password']
        ];

        if (!$auth) {
            $validatorMaker['name'] = $this->dataRequest['name'];
            $validatorMaker['ruc'] = $this->dataRequest['ruc'];
            $validatorMaker['password_confirmation'] = $this->dataRequest['password_confirmation'];
        }

        $loginRules = [
            'email' => 'required|email:rfc',
            'password' => ['required', 'string', Password::min(8)]
        ];

        $registerRules = [
            'name' => 'required|string',
            'ruc' => 'required|digits:11',
            'email' => 'required|email:rfc|unique:'.$table.',email',
            'password' => ['required', 'string', Password::min(8), 'confirmed']
        ];

        $validator = Validator::make($validatorMaker, ( $auth ? $loginRules : $registerRules ));

        if ($validator->fails()) {
            return ['status' => false, 'messages' => $validator->messages()];
        }

        return ['status' => true];
    }

    public function register($model, $device)
    {
        $validation = $this->validateInput(app($model)->getTable());

        if ($validation['status']) {
            $user = $model::create([
                'name' => $this->dataRequest['name'],
                'ruc' => $this->dataRequest['ruc'],
                'email' => $this->dataRequest['email'],
                'password' => Hash::make($this->dataRequest['password']),
                'status' => true
            ]);
            $token = $user->createToken($device)->plainTextToken;
            return ['status' => true, 'token' => $token, 'user' => $user];
        }

        return $validation;
    }

    public function login($model, $device)
    {
        $validation = $this->validateInput($model, true);

        if ($validation['status']) {
            $user = $model::where('email', $this->dataRequest['email'])->first();

            if (!$user) {
                return ['status' => false, 'messages' => ['email' => "La dirección de correo no existe."]];
            }

            if (Hash::check($this->dataRequest['password'], $user->password)) {
                $token = $user->createToken($device)->plainTextToken;
                return ['status' => true, 'token' => $token, 'user' => $user];
            }

            return ['status' => false, 'messages' => ['password' => 'La contraseña es incorrecta.']];
        }

        return $validation;
    }
}
