<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function showDashboardAdmin()
    {
        return view('admin.dashboardadmin');
    }
    public function showDashboardCus()
    {
        return view('customer.dashboardcus');
    }
    public function logoutcus(Request $request)
    {
        return redirect()->route('confirmlogoutcus');
    }
    public function confirmLogoutCus(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/logincustomer');
    }

    public function logoutadmin(Request $request)
    {
        return redirect()->route('confirmlogoutadmin');
    }

    public function confirmLogoutAdmin(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/loginadmin');
    }
}
