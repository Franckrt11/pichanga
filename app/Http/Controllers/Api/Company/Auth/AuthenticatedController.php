<?php

namespace App\Http\Controllers\Api\Company\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyActivityLog;
use App\Helper\AuthCompanyService;
use Illuminate\Http\Request;

class AuthenticatedController extends Controller
{
    public function register(Request $request)
    {
        $response = (new AuthCompanyService($request->all()))->register(Company::class, $request->device);
        CompanyActivityLog::create([
            'message' => 'Has registrado una nueva cuenta.',
            'company_id' => $response['user']->id
        ]);
        return response()->json($response);
    }

    public function login(Request $request)
    {
        $response = (new AuthCompanyService($request->all()))->login(Company::class, $request->device);
        CompanyActivityLog::create([
            'message' => 'Has iniciado sesion.',
            'company_id' => $response['user']->id
        ]);
        return response()->json($response);
    }

    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken()->delete();
        return response()->json(['status' => true, 'token' => $token]);
    }
}
