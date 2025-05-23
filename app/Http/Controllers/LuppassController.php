<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LuppassController extends Controller
{
    public function showLuppassFormCus()
    {
        return view('customer.luppasscus');
    }

    public function showLuppassFormAdmin()
    {
        return view('admin.luppassadmin');
    }

    public function lupaPasswordCus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username_cus' => 'required',
            'pertanyaan' => 'required',
            'jawaban' => 'required',
            'pw_cus' => 'required|min:6',
            'password_confirm' => 'required|same:pw_cus',
        ], [
            'username_cus.required' => 'Username harus diisi.',
            'pertanyaan.required' => 'Pertanyaan keamanan harus dipilih.',
            'jawaban.required' => 'Jawaban keamanan harus diisi.',
            'pw_cus.required' => 'Password baru harus diisi.',
            'pw_cus.min' => 'Password baru minimal harus :min karakter.',
            'password_confirm.required' => 'Konfirmasi password baru harus diisi.',
            'password_confirm.same' => 'Konfirmasi password baru tidak cocok dengan password baru.',
        ]);

        if ($validator->fails()) {
            return redirect('/lupapasswordcustomer')
                        ->withErrors($validator)
                        ->withInput();
        }

        $username_cus = $request->input('username_cus');
        $pertanyaan = $request->input('pertanyaan');
        $jawaban = $request->input('jawaban');
        $pw_cus = $request->input('pw_cus');

        $customer = DB::table('customer')
                        ->where('username_cus', $username_cus)
                        ->where('pertanyaan', $pertanyaan)
                        ->where('jawaban', $jawaban)
                        ->first();

        if (!$customer) {
            return redirect('/lupapasswordcustomer')
                        ->withErrors(['error' => 'Username, pertanyaan keamanan, atau jawaban salah.'])
                        ->withInput();
        }

        DB::table('customer')
            ->where('username_cus', $username_cus)
            ->update(['pw_cus' => $pw_cus]);

        return redirect('/logincustomer')->withErrors(['success' => 'Password berhasil direset! Silakan login dengan password baru Anda.']);
    }

    public function lupaPasswordAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username_admin' => 'required',
            'pertanyaan' => 'required',
            'jawaban' => 'required',
            'pw_admin' => 'required|min:6',
            'password_confirm' => 'required|same:pw_admin',
        ], [
            'username_admin.required' => 'Username harus diisi.',
            'pertanyaan.required' => 'Pertanyaan keamanan harus dipilih.',
            'jawaban.required' => 'Jawaban keamanan harus diisi.',
            'pw_admin.required' => 'Password baru harus diisi.',
            'pw_admin.min' => 'Password baru minimal harus :min karakter.',
            'password_confirm.required' => 'Konfirmasi password baru harus diisi.',
            'password_confirm.same' => 'Konfirmasi password baru tidak cocok dengan password baru.',
        ]);

        if ($validator->fails()) {
            return redirect('/lupapasswordadmin')
                        ->withErrors($validator)
                        ->withInput();
        }

        $username_admin = $request->input('username_admin');
        $pertanyaan = $request->input('pertanyaan');
        $jawaban = $request->input('jawaban');
        $pw_admin = $request->input('pw_admin');

        $admin = DB::table('admin')
                        ->where('username_admin', $username_admin)
                        ->where('pertanyaan', $pertanyaan)
                        ->where('jawaban', $jawaban)
                        ->first();

        if (!$admin) {
            return redirect('/lupapasswordadmin')
                        ->withErrors(['error' => 'Username, pertanyaan keamanan, atau jawaban salah.'])
                        ->withInput();
        }

        DB::table('admin')
            ->where('username_admin', $username_admin)
            ->update(['pw_admin' => $pw_admin]);

        return redirect('/loginadmin')->withErrors(['success' => 'Password berhasil direset! Silakan login dengan password baru Anda.']);
    }
}
