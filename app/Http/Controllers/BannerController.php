<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index() {
        $user = User::get();
        $banner = Banner::Paginate(4);

        return view('admin.Banner.index', compact('user', 'banner'));
    }
}
