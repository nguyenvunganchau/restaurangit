<?php

namespace App\Http\Controllers\Auth;

use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    public function show_login_admin(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('employee.auth.login');
    }


    public function login_admin(Request $request)
    {
        $data = $request->all();
        $email = $data['email'];
        $password = $data['password'];

        if (Auth::attempt(['email' => $email ,'password' => $password])) {
            return redirect()->route('show_list_table.index');
        }else {
            return redirect()->route('show_login.index')->with('error', 'Invalid credentials');
        }
        
    }

    public function logout_admin(): RedirectResponse
    {
        Auth::guard('web')->logout();
        return redirect()->route('show_login.index');

    }
}
