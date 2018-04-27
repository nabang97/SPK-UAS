<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nKriteria = Kriteria::all()->count();
        $nAlternatif = Alternatif::all()->count();

        $terbaik = Alternatif::orderBy('nilai_akhir', 'desc')->first();

        return view('home', compact('nKriteria', 'nAlternatif', 'terbaik'));
    }
}
