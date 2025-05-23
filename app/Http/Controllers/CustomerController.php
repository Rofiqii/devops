<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Event;
use App\Models\Masukan;

class CustomerController extends Controller
{
    public function showWisataCustomer()
    {
        $wisatas = Wisata::all();
        return view('customer.wisatacus', ['wisatas' => $wisatas]);
    }
    public function showDetailWisataCustomer($kd_wisata)
    {
        $wisata = Wisata::with('event')->where('kd_wisata', $kd_wisata)->first();
        if (!$wisata) {
            return redirect()->route('customer.wisatacus')->with('error', 'Data tidak ditemukan');
        }
        return view('customer.detailwisatacus', ['wisata' => $wisata]);
    }
    public function showEventCustomer()
    {
        $events = Event::all();
        return view('customer.eventcus', ['events' => $events]);
    }
        public function showDetailEventCustomer($kd_event)
    {
        $event = Event::with('wisata')->where('kd_event', $kd_event)->first();
        if (!$event) {
            return redirect()->route('customer.eventcus')->with('error', 'Data tidak ditemukan');
        }
        return view('customer.detaileventcus', ['event' => $event]);
    }
    public function showMasukanCustomer()
    {
        $masukans = Masukan::all();
        return view('customer.masukancus', compact('masukans'));
    }
    public function showFormMasukanCustomer()
    {
        $masukan = Masukan::all();
        return view('customer.formmasukancus', compact('masukan'));
    }
    public function tambahMasukan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|min:2',
            'masukan' => 'required|string|max:250',
        ], [
            'nama.required' => 'Mohon isi nama anda.',
            'nama.min' => 'Nama minimal 2 karakter.',
            'masukan.required' => 'Mohon isi masukan anda.',
            'masukan.max' => 'Masukan maksimal 300 karakter.',
        ]);
        $masukan = new Masukan();
        $masukan->nama = $request->nama;
        $masukan->masukan = $request->masukan;
        $masukan->username_cus = 'Customer';
        $masukan->save();
        return redirect()->route('masukancustomer')->with('success', 'Masukan berhasil ditambahkan');
    }
        public function showDetailMasukanCustomer($kd_masukan)
    {
        $masukan = Masukan::find($kd_masukan);
        return view('customer.detailmasukancus', compact('masukan'));
    }
}
?>
