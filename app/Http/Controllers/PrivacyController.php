<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Config;

class PrivacyController extends Controller
{
    public function index()
    {
        $privacy = Config::where('type', 'privacy')->first();
        return view('privacy', compact('privacy'));
    }
}
