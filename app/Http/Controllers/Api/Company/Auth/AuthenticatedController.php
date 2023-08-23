<?php

namespace App\Http\Controllers\Api\Company\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Helper\AuthService;
use Illuminate\Http\Request;

class AuthenticatedController extends Controller
{
    public function register(Request $request)
    {
        $response = (new AuthService($request->all()))->register(Company::class, $request->device);
        return response()->json($response);
    }

    public function login(Request $request)
    {
        $response = (new AuthService($request->all()))->login(Company::class, $request->device);
        return response()->json($response);
    }

    public function logout()
    {
        //
    }
}
