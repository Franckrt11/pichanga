<?php

namespace App\Http\Controllers\Api\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Helper\AuthService;
use Illuminate\Http\Request;

class AuthenticatedController extends Controller
{
    public function register(Request $request)
    {
        $response = (new AuthService($request->all()))->register(User::class, $request->device);
        return response()->json($response);
    }

    public function login(Request $request)
    {
        $response = (new AuthService($request->all()))->login(User::class, $request->device);
        return response()->json($response);
    }

    public function logout()
    {
        //
    }
}
