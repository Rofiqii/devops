<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginFormCus()
    {
        return view('customer.indexcus');
    }

    public function showLoginFormAdmin()
    {
        return view('admin.indexadmin');
    }

    public function loginCus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username_cus' => 'required',
            'pw_cus' => 'required',
        ], [
            'username_cus.required' => 'Username harus diisi.',
            'pw_cus.required' => 'Password harus diisi.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('customer.indexcus')->withErrors($validator)->withInput();
        }

        $username = $request->input('username_cus');
        $password = $request->input('pw_cus');

        $customer = customer::where('username_cus', $username)->first();

        if (!$customer) {
            return redirect()->route('indexcus')->withErrors(['error' => 'Username tidak ditemukan']);
        }
        if ($customer->pw_cus === $password) {
            return redirect()->intended('/customer/dashboard');
        } else {
            return redirect()->route('indexcus')->withErrors(['error' => 'Username atau password salah']);
        }
    }

    public function loginAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username_admin' => 'required',
            'pw_admin' => 'required',
        ], [
            'username_admin.required' => 'Username harus diisi.',
            'pw_admin.required' => 'Password harus diisi.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('indexadmin')->withErrors($validator)->withInput();
        }

        $username = $request->input('username_admin');
        $password = $request->input('pw_admin');

        $admin = admin::where('username_admin', $username)->first();

        if (!$admin) {
            return redirect()->route('indexadmin')->withErrors(['error' => 'Username tidak ditemukan']);
        }
        if ($admin->pw_admin === $password) {
            return redirect()->intended('/admin/dashboard');
        } else {
            return redirect()->route('indexadmin')->withErrors(['error' => 'Username atau password salah']);
        }
    }
}
