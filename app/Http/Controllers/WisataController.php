<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;

class WisataController extends Controller
{
    public function cariwisatacus(Request $request)
    {
        $keyword = $request->input('keyword');
        $wisatas = Wisata::where('nama_wisata', 'like', "%$keyword%")->get();
        if ($wisatas->isEmpty()) {
            return redirect()->back()->with('error', 'Wisata tidak ditemukan.');
        }
        return view('customer.hasilcariwisatacus', ['wisatas' => $wisatas]);
    }
    public function cariwisataadmin(Request $request)
    {
        $keyword = $request->input('keyword');
        $wisatas = Wisata::where('nama_wisata', 'like', "%$keyword%")->get();
        if ($wisatas->isEmpty()) {
            return redirect()->back()->with('error', 'Wisata tidak ditemukan.');
        }
        return view('admin.hasilcariwisataadmin', ['wisatas' => $wisatas]);
    }
    public function get_recommended_products(Request $request){
        $list = Wisata::latest()->get();

                foreach ($list as $item){
                    
                    
                }

                 $data =  [
                    'total_size' => $list->count(),
                    'offset' => 0,
                    'products' => $list
                ];

         return response()->json($data,200);
}
}
