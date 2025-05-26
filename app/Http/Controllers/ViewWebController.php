<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewWebController extends Controller
{
   public function registerIndex()
    {
        return view('auth.register');
    }
    public function loginIndex()
    {
        return view('auth.login');
    }
}
