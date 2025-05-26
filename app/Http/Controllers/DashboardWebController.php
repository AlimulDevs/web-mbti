<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardWebController extends Controller
{
    public function dashboardIndex()
    {
        return view('admin.dashboard');
    }
}
