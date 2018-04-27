<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiAlternatifKriteria;

use App\Models\NilaiKriteria;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rataAlternatifs = NilaiAlternatifKriteria::get(['alternatif_1_id', 'rata_alternatif_kriteria']);
        $namaAlternatifs = Alternatif::get(['nama']);

        $i = 0;
        $dataRataAlt = [];

        foreach ($rataAlternatifs as $rataAlternatif){
            if(!isset($cekIdAlt)){
                $cekIdAlt = $rataAlternatif->alternatif_1_id;
                $dataRataAlt[$i] =  $rataAlternatif->rata_alternatif_kriteria;
            }else{
                if($cekIdAlt != $rataAlternatif->alternatif_1_id){
                    $cekIdAlt = $rataAlternatif->alternatif_1_id;
                    $dataRataAlt[$i] =  $rataAlternatif->rata_alternatif_kriteria;
                }
            }
            $i++;
        }

        $nAlt = $namaAlternatifs->count();
        $matriksAlt = [];

        $x = 0;
        $y = 0;
        foreach ($dataRataAlt as $dataRata) {
            if($x < $nAlt ){
                $matriksAlt[$x][$y] = $dataRata;
                $x++;
            }else{
                $x = 0;
                $y++;
                $matriksAlt[$x][$y] = $dataRata;
                $x++;
            }
        }

        $rataKriterias = Kriteria::get(['nama_kriteria','rata_kriteria']);
        $nKri = $rataKriterias->count();

        $a = 0;
        $matriksKri = [];
        foreach ($rataKriterias as $rataKriteria){
            $matriksKri[$a] = $rataKriteria->rata_kriteria;
            $a++;
        }

        $hasil = [];
        for($s=0; $s < $nAlt; $s++){
            for($t=0; $t < $nKri; $t++){
                if(!isset($hasil[$s])){
                    $hasil[$s] = 0 ;
                }
                $hasil[$s] += $matriksAlt[$s][$t] * $matriksKri[$t];
            }
            $updateHasil = Alternatif::where('id', '=', ($s+1))
                ->update(['nilai_akhir' => $hasil[$s]]);
        }

        $hasilAHP = Alternatif::orderBy('nilai_akhir', 'desc')->get();

        $kriterias = NilaiKriteria::get(['kriteria_1_id', 'bobot_kriteria']);
        $matriksBobotKri = [];

        $x = 0;
        $y = 0;
        foreach ($kriterias as $kriteria) {
            if($x < $nKri ){
                $matriksBobotKri[$y][$x] = $kriteria->bobot_kriteria;
                $x++;
            }else{
                $x = 0;
                $y++;
                $matriksBobotKri[$y][$x] = $kriteria->bobot_kriteria;
                $x++;
            }
        }

        $hasilKaliKons = [];
        for($s=0; $s < $nKri; $s++){
            for($t=0; $t < $nKri; $t++){
                if(!isset($hasilKaliKons[$s])){
                    $hasilKaliKons[$s] = 0 ;
                }
                $hasilKaliKons[$s] += $matriksBobotKri[$s][$t] * $matriksKri[$t];
            }
        }

        $hasilKons = [];
        $jumlahKons = 0;

        for($i=0;$i<$nKri;$i++){
            $hasilKons[$i] = $hasilKaliKons[$i]/$matriksKri[$i];
            $jumlahKons += $hasilKons[$i];
        }

        $rataKons = $jumlahKons/$nKri;

        $CI = ($rataKons - $nKri)/($nKri-1);

        if($CI > 0){
            foreach (config('value.RI') as $key => $value){
                if($nKri == $key){
                    $CI = $CI/$value;
                }
            }
        }

        return view('hasil.index', compact('matriksAlt', 'rataKriterias', 'namaAlternatifs', 'hasilAHP', 'CI'));
    }
}
