<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function dashboardGeneral(){
        $data['blogs'] = Blog::count();
        $data['categories'] = Category::count();
        $data['type_menu'] = 'dashboard';
        return view('Blog.dashboard', $data);
    }
}
