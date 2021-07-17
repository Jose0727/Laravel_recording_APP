<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class CustomUserLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }

    public function create()
    {
        return view('auth.custom-user-login');
    }
    public function adminLogin()
    {
        return view('auth.custom-admin-login');
    }
    public function store(Request $request)
    {
        $rules = [
            'passcode' => 'required|string',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $user = User::where('passcode', $request->passcode)->first();
        if(!$user) {
            return back()->with('error','No user found with this id !');
        }
        if($user->type != $request->type) {
            return back()->with('error','You are in the wrong place !');
        }
        if (! Auth::loginUsingId($user->id)) {
            throw ValidationException::withMessages([
                'passcode' => __('auth.failed'),
            ]);
        }
        $request->session()->regenerate();

        if($user->type == 'admin') {
            return redirect()->to('/dashboard');//one issue in admin permission
        }
        return redirect()->intended('/report');
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
