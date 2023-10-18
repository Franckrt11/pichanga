<?php

namespace App\Helper;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class AuthUserService {

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
            $validatorMaker['lastname'] = $this->dataRequest['lastname'];
            $validatorMaker['phone'] = $this->dataRequest['phone'];
            $validatorMaker['district'] = $this->dataRequest['district'];
            $validatorMaker['password_confirmation'] = $this->dataRequest['password_confirmation'];
        }

        $loginRules = [
            'email' => 'required|email:rfc',
            'password' => ['required', 'string', Password::min(8)]
        ];

        $registerRules = [
            'name' => 'required|string',
            'lastname' => 'required|string',
            'phone' => 'digits:9',
            'email' => 'email:rfc|unique:'.$table.',email',
            'district' => 'required|string',
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
                'lastname' => $this->dataRequest['lastname'],
                'email' => $this->dataRequest['email'],
                'phone' => $this->dataRequest['phone'],
                'district' => $this->dataRequest['district'],
                'password' => Hash::make($this->dataRequest['password'])
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
