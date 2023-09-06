<?php

namespace App\Http\Controllers\Api\Company\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed'],
        ]);
        return response()->json(['status' => TRUE]);
    }
}
