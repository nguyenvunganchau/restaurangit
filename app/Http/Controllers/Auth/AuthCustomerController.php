<?php

namespace App\Http\Controllers\Auth;

use App\Modules\Customer\Models\Customer;
use App\Modules\Table\Models\TableType;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class AuthCustomerController extends BaseController
{
    public function show_login_customer(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $name = $request->get('name');
        if ($name) {
            $table_type = TableType::where('name', 'like', '%' . $name . '%')->get();
        } else {
            $table_type = TableType::all();
        }

        return view('customer.page.login', compact('name'));
    }
    public function show_register_customer(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $name = $request->get('name');
        if ($name) {
            $table_type = TableType::where('name', 'like', '%' . $name . '%')->get();
        } else {
            $table_type = TableType::all();
        }

        return view('customer.page.register', compact('name'));
    }
    public function register_customer(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên!',
            'phone.required' => 'Vui lòng nhập số điện thoại!',
            'email.required' => 'Vui lòng nhập email!',
            'email.email' => 'Email không đúng định dạng!',
            'password.required' => 'Vui lòng nhập mật khẩu!',
        ], []);
        try {
            $customer = new Customer();
            $customer->fill($request->input());
            $customer->password = bcrypt($request->input('password'));
            $customer->save();
            return redirect()->route('show_login_customer.index')->with('success', 'Cảm ơn bạn đã đăng ký là khách hàng thân thiết');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function login_customer(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'email' => 'required|email',
        ], [
            'password.required' => 'Vui lòng nhập mật khẩu!',
            'email.required' => 'Vui lòng nhập email!',
            'email.email' => 'Email không đúng định dạng!',
        ], []);
        try {
            $credentials = $request->only('email', 'password');
            if (Auth::guard('customer')->attempt($credentials)) {
                return redirect()->route('show_home.index');
            } else {
                return redirect()->route('show_home.index')->with('error', 'Invalid credentials');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function logout_customer(): RedirectResponse
    {
        Auth::guard('customer')->logout();
        return redirect()->route('show_login_customer.index');
    }
}
