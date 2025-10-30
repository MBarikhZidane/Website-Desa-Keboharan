<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class KependudukanController extends Controller
{
    public function viewAgama()
    {
                        $setting = Setting::first();

        return view('dashboard.kependudukan.agama',compact('setting'));
    }

    public function viewDusun()
    {
                        $setting = Setting::first();

        return view('dashboard.kependudukan.dusun',compact('setting'));
    }

    public function ViewPendidikan()
    {
                        $setting = Setting::first();

        return view('dashboard.kependudukan.pendidikan',compact('setting'));
    }
}
