<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class KecamatanController extends Controller
{
    public function create()
    {
        return view('alternatifs.createKec');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        DB::table('kecamatans')->insert(
            ['nama_kec' => $request->nama]
        );

        Flash::success('Kecamatan saved successfully.');

        return redirect(route('alternatifs.index'));
    }

    public function storeDetail(Request $request)
    {
        $input = $request->all();

        DB::table('detail_kecamatans')->insert(
            [
                'kec_id' => $request->kec_id,
                'nama_kec_pil' => $request->nama
            ]
        );

        Flash::success('Sub Kecamatan saved successfully.');

        return redirect(route('alternatifs.index'));
    }

}
