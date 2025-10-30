<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class AnggaranController extends Controller
{
    public function viewpendapatan()
    {
                $setting = Setting::first();

        return view('dashboard.anggaran.pendapatan', compact('setting'));
    }

    public function viewpengeluaran()
    {
                $setting = Setting::first();

        return view('dashboard.anggaran.pengeluaran', compact('setting'));
    }
}
