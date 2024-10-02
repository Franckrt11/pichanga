<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Config;

class TermsController extends Controller
{
    public function index()
    {
        $terms = Config::where('type', 'terms')->first();
        return view('terms', compact('terms'));
    }
}
