<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class ProfildesaController extends Controller
{
    public function viewcarousel()
    {
        $setting = Setting::first();

        return view('dashboard.profil-desa.carousel', compact('setting'));
    }

    public function viewvisimisi()
    {
                $setting = Setting::first();

        return view('dashboard.profil-desa.visimisi', compact('setting'));
    }

    public function vieworganisasi()
    {
                $setting = Setting::first();

        return view('dashboard.organisasi.organisasi', compact('setting'));
    }

    public function viewpetalokasi()
    {
                $setting = Setting::first();

        return view('dashboard.profil-desa.petalokasi', compact('setting'));
    }

    public function viewproduk()
    {
                $setting = Setting::first();

        return view('dashboard.umkm-desa.produk', compact('setting'));
    }

    public function viewberita()
    {
                $setting = Setting::first();

        return view('dashboard.berita.berita', compact('setting'));
    }

    public function viewgaleri()
    {
                $setting = Setting::first();

        return view('dashboard.galeri.galeri', compact('setting'));
    }

    public function viewsetting()
    {
                $setting = Setting::first();

        return view('dashboard.pengaturan', compact('setting'));
    }


}
