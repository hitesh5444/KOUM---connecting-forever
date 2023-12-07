<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Banner;

class AllController extends Controller
{
    public function index() {
        $project = Project::Paginate(4);
        $banner = Banner::Paginate(4);

        return view('front-side.welcome', compact('project', 'banner'));
    }
}
