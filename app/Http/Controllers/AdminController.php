<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        if(auth()->user()->type != 'admin') {
            return back();
        }
        return view('admin.dashboard');
    }
}
