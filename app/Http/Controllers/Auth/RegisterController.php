<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index() {
        $key = Str::random(50);

        return view('welcome', compact('key'));
    }

    public function register(Request $request) {
        dd($request);
    }
}
