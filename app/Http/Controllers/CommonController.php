<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CommonController extends Controller
{
    public function index() {
        $key = Str::random(50);

        return view('welcome', compact('key'));
    }

    public function dashboard() {
        $user = User::get();

        return view('admin.dashboard', compact('user'));
    }

    public function profile() {
        $user = User::get();

        return view('admin.profile', compact('user'));
    }
}
