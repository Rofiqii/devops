<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function carieventcus(Request $request)
    {
        $keyword = $request->input('keyword');
        $events = Event::where('judul', 'like', "%$keyword%")->get();
        if ($events->isEmpty()) {
            return redirect()->back()->with('error', 'Event tidak ditemukan.');
        }
        return view('customer.hasilcarieventcus', ['events' => $events]);
    }
    public function carieventadmin(Request $request)
    {
        $keyword = $request->input('keyword');
        $events = Event::where('judul', 'like', "%$keyword%")->get();
        if ($events->isEmpty()) {
            return redirect()->back()->with('error', 'Event tidak ditemukan.');
        }
        return view('admin.hasilcarieventadmin', ['events' => $events]);
    }
}
