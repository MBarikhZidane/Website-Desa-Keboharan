<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Dusun;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Produk;
use App\Models\Setting;
use App\Models\Carousel;
use App\Models\Visimisi;
use App\Models\Organisasi;
use App\Models\Pendapatan;
use App\Models\Petalokasi;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use App\Models\Jenispendidikan;

class BerandaController extends Controller
{
    public function index()
    {
        $visimisi = Visimisi::first();

        $organisasis = Organisasi::all();
        $carousels = Carousel::all();

        $total_laki = Dusun::sum('total_pria');
        $total_perempuan = Dusun::sum('total_perempuan');
        $total_kepala_keluarga = Dusun::sum('total_kepalakeluarga');
        $total_penduduk = $total_laki + $total_perempuan;

        $total_pendapatan = Pendapatan::sum('total_anggaran');
        $total_belanja = Pengeluaran::sum('total_anggaran');

        $beritas = Berita::latest()->take(5)->get();

        $galeris = Galeri::latest()->take(8)->get();

        $produks = Produk::latest()->take(8)->get();

        $setting = Setting::first();

        return view('landingpage.beranda', compact(
            'visimisi',
            'organisasis',
            'total_laki',
            'total_perempuan',
            'total_kepala_keluarga',
            'total_penduduk',
            'total_pendapatan',
            'total_belanja',
            'beritas',
            'galeris',
            'produks',
            'carousels',
            'setting'
        ));
    }

    public function profil()
    {
        $visimisi = Visimisi::first();
        $lokasis = Petalokasi::first();
        $organisasis = Organisasi::all();
        $setting = Setting::first();


        return view('landingpage.profil', compact(
            'visimisi',
            'organisasis',
            'lokasis',
            'setting'
        ));
    }

    public function belanja()
    {
        $setting = Setting::first();
        $produks = Produk::all();

        return view('landingpage.belanja', compact(
            'produks',
            'setting'
        ));
    }

    public function berita()
    {
        $setting = Setting::first();
        $beritas = Berita::all();

        return view('landingpage.berita', compact(
            'beritas',
            'setting'
        ));
    }

    public function infografis()
    {
        $dusuns = Dusun::select('name', 'total_pria', 'total_perempuan', 'total_kepalakeluarga')->get();

        $totalPenduduk = $dusuns->sum(fn($d) => $d->total_pria + $d->total_perempuan);
        $totalLaki = $dusuns->sum('total_pria');
        $totalPerempuan = $dusuns->sum('total_perempuan');
        $totalKK = $dusuns->sum('total_kepalakeluarga');

        $labelsDusun = $dusuns->pluck('name');
        $dataDusun = $dusuns->map(fn($d) => $d->total_pria + $d->total_perempuan);

        $pendidikan = Jenispendidikan::with('jumlahpendidikans')->get();
        $labelsPendidikan = $pendidikan->pluck('name');
        $dataPendidikan = $pendidikan->map(fn($p) => $p->jumlahpendidikans->sum('jumlah'));
        $setting = Setting::first();


        $agama = Agama::with('pemelukagamas')->get();
        $dataAgama = $agama->map(fn($a) => [
            'name' => $a->name,
            'jumlah' => $a->pemelukagamas->sum('jumlah')
        ]);

        return view('landingpage.infografis', [
            'totalPenduduk' => $totalPenduduk,
            'totalKK' => $totalKK,
            'totalLaki' => $totalLaki,
            'totalPerempuan' => $totalPerempuan,
            'labelsDusun' => $labelsDusun,
            'dataDusun' => $dataDusun,
            'labelsPendidikan' => $labelsPendidikan,
            'dataPendidikan' => $dataPendidikan,
            'dataAgama' => $dataAgama,
            'setting' => $setting,
        ]);
    }

    public function apbdes()
    {
        $tahunList = Pendapatan::select('tahun')->distinct()->orderBy('tahun', 'asc')->pluck('tahun');

        $setting = Setting::first();
        $dataPerTahun = [];
        foreach ($tahunList as $tahun) {
            $pendapatan = Pendapatan::where('tahun', $tahun)->sum('total_anggaran');
            $belanja = Pengeluaran::where('tahun', $tahun)->sum('total_anggaran');


            $dataPerTahun[$tahun] = [
                'pendapatan' => $pendapatan,
                'belanja' => $belanja,
                'pembiayaan' => 0, // kalau belum ada tabel pembiayaan
                'pendapatanRincian' => Pendapatan::where('tahun', $tahun)->pluck('total_anggaran'),
                'belanjaRincian' => Pengeluaran::where('tahun', $tahun)->pluck('total_anggaran'),
                'pembiayaanRincian' => [0, 0],
            ];
        }
        return view('landingpage.apbdes', [
            'dataPerTahun' => $dataPerTahun,
            'tahunList' => $tahunList,
            'setting' => $setting,
        ]);
    }

    public function showbelanja($id)
    {
        $produk = Produk::findOrFail($id);
        $setting = Setting::first();
        return view('landingpage.detail-produk', compact(['produk', 'setting']));
    }

    public function showberita($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        $setting = Setting::first();
        return view('landingpage.detail-berita', compact(['berita', 'setting']));
    }

    public function showdashboard()
    {

        $total_laki = Dusun::sum('total_pria');
        $total_perempuan = Dusun::sum('total_perempuan');
        $total_kepala_keluarga = Dusun::sum('total_kepalakeluarga');
        $total_penduduk = $total_laki + $total_perempuan;

        $total_pendapatan = Pendapatan::sum('total_anggaran');
        $total_belanja = Pengeluaran::sum('total_anggaran');

        $setting = Setting::first();

        return view('dashboard.home', compact(
            'total_penduduk',
            'total_laki',
            'total_perempuan',
            'total_kepala_keluarga',
            'total_pendapatan',
            'total_belanja',
            'setting'
        ));
    }
}
