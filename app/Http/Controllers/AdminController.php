<?php

namespace App\Http\Controllers;

use App\Models\UserReport;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        if(auth()->user()->type != 'admin') {
            return back();
        }
        $report = UserReport::with('user')->latest()->get();
        return view('admin.dashboard', compact('report'));
    }
}
