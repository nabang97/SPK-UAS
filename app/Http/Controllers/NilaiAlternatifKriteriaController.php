<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNilaiAlternatifKriteriaRequest;
use App\Http\Requests\UpdateNilaiAlternatifKriteriaRequest;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiAlternatifKriteria;
use App\Repositories\NilaiAlternatifKriteriaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class NilaiAlternatifKriteriaController extends AppBaseController
{
    /** @var  NilaiAlternatifKriteriaRepository */
    private $nilaiAlternatifKriteriaRepository;

    public function __construct(NilaiAlternatifKriteriaRepository $nilaiAlternatifKriteriaRepo)
    {
        $this->nilaiAlternatifKriteriaRepository = $nilaiAlternatifKriteriaRepo;
    }

    /**
     * Display a listing of the NilaiAlternatifKriteria.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->nilaiAlternatifKriteriaRepository->pushCriteria(new RequestCriteria($request));
        $nilaiAlternatifKriterias = $this->nilaiAlternatifKriteriaRepository->all();

        $kriterias = Kriteria::get();

        return view('nilai_alternatif_kriterias.index', compact('nilaiAlternatifKriterias', 'kriterias'));
    }

    /**
     * Show the form for creating a new NilaiAlternatifKriteria.
     *
     * @return Response
     */
    public function create()
    {
//        $alternatifs = Alternatif::get(['id', 'nama'])->toArray();
//
//        return view('nilai_alternatif_kriterias.create', compact('alternatifs'));
    }

    public function createByKriteria($id)
    {
        $jumlahNilaiAternatif = NilaiAlternatifKriteria::where('kriteria_id', '=', $id)->count();
        if($jumlahNilaiAternatif != 0){
            Flash::error('Nilai Alternatif Untuk Kriteria Ini Sudah Ada');

            return redirect(route('nilaiAlternatifKriterias.index'));
        }

        $alternatifs = Alternatif::get(['id', 'nama'])->toArray();
        $namaKriteria = Kriteria::where('id', '=', $id)->first(['nama_kriteria']);
        $nama = $namaKriteria['nama_kriteria'];


        return view('nilai_alternatif_kriterias.create', compact('alternatifs', 'id', 'nama'));
    }

    /**
     * Store a newly created NilaiAlternatifKriteria in storage.
     *
     * @param CreateNilaiAlternatifKriteriaRequest $request
     *
     * @return Response
     */
    public function store(CreateNilaiAlternatifKriteriaRequest $request)
    {
        $allData = $request->all();

        $n = count($allData['alternatif_1_id']);
        for($i=0; $i < $n; $i++){
            $input['alternatif_1_id'] = $request->alternatif_1_id[$i];
            $input['alternatif_2_id']= $request->alternatif_2_id[$i];
            $input['kriteria_id'] = $request->kriteria_id;
            $input['bobot_alternatif']= $request->bobot_alternatif[$i];

            $nilaiKriteria = $this->nilaiAlternatifKriteriaRepository->create($input);
        }

        $i=0;

        $alternatifs = Alternatif::get();
        foreach ($alternatifs as $alternatif) {
            $sumAlt[] = NilaiAlternatifKriteria::where('alternatif_2_id', $alternatif->id)
                ->where('kriteria_id', '=', $request->kriteria_id)
                ->sum('bobot_alternatif');

            $nilaiAlternatifs = NilaiAlternatifKriteria::where('alternatif_2_id', $alternatif->id)
                ->where('kriteria_id', '=', $request->kriteria_id)
                ->get();

            foreach($nilaiAlternatifs as $nilaiAlternatif){
                $normAlt = $nilaiAlternatif->bobot_alternatif/$sumAlt[$i];

                $updateNorm = NilaiAlternatifKriteria::where('id', '=', $nilaiAlternatif->id)
                    ->where('kriteria_id', '=', $request->kriteria_id)
                    ->update(['norm_alternatif' => $normAlt]);

            }
            $i++;



            $rataAlternatif= NilaiAlternatifKriteria::where('alternatif_1_id', '=', $alternatif->id)
                ->where('kriteria_id', '=', $request->kriteria_id)
                ->avg('norm_alternatif');
            $updateRataAlternatif = NilaiAlternatifKriteria::where('alternatif_1_id', '=', $alternatif->id)
                ->where('kriteria_id', '=', $request->kriteria_id)
                ->update(['rata_alternatif_kriteria' => $rataAlternatif]);
        }



        Flash::success('Nilai Alternatif Kriteria saved successfully.');

        return redirect(route('nilaiAlternatifKriterias.index'));
    }

    /**
     * Display the specified NilaiAlternatifKriteria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nilaiAlternatifKriteria = $this->nilaiAlternatifKriteriaRepository->findWithoutFail($id);

        if (empty($nilaiAlternatifKriteria)) {
            Flash::error('Nilai Alternatif Kriteria not found');

            return redirect(route('nilaiAlternatifKriterias.index'));
        }

        return view('nilai_alternatif_kriterias.show')->with('nilaiAlternatifKriteria', $nilaiAlternatifKriteria);
    }

    /**
     * Show the form for editing the specified NilaiAlternatifKriteria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nilaiAlternatifKriteria = $this->nilaiAlternatifKriteriaRepository->findWithoutFail($id);

        if (empty($nilaiAlternatifKriteria)) {
            Flash::error('Nilai Alternatif Kriteria not found');

            return redirect(route('nilaiAlternatifKriterias.index'));
        }

        return view('nilai_alternatif_kriterias.edit')->with('nilaiAlternatifKriteria', $nilaiAlternatifKriteria);
    }

    /**
     * Update the specified NilaiAlternatifKriteria in storage.
     *
     * @param  int              $id
     * @param UpdateNilaiAlternatifKriteriaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNilaiAlternatifKriteriaRequest $request)
    {
        $nilaiAlternatifKriteria = $this->nilaiAlternatifKriteriaRepository->findWithoutFail($id);

        if (empty($nilaiAlternatifKriteria)) {
            Flash::error('Nilai Alternatif Kriteria not found');

            return redirect(route('nilaiAlternatifKriterias.index'));
        }

        $nilaiAlternatifKriteria = $this->nilaiAlternatifKriteriaRepository->update($request->all(), $id);

        Flash::success('Nilai Alternatif Kriteria updated successfully.');

        return redirect(route('nilaiAlternatifKriterias.index'));
    }

    /**
     * Remove the specified NilaiAlternatifKriteria from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nilaiAlternatifKriteria = $this->nilaiAlternatifKriteriaRepository->findWithoutFail($id);

        if (empty($nilaiAlternatifKriteria)) {
            Flash::error('Nilai Alternatif Kriteria not found');

            return redirect(route('nilaiAlternatifKriterias.index'));
        }

        $this->nilaiAlternatifKriteriaRepository->delete($id);

        Flash::success('Nilai Alternatif Kriteria deleted successfully.');

        return redirect(route('nilaiAlternatifKriterias.index'));
    }

    public function hapus()
    {
        $nilaiAlternatifKriteria = $this->nilaiAlternatifKriteriaRepository->all();

        if (empty($nilaiAlternatifKriteria)) {
            Flash::error('Nilai Alternatif Kriteria not found');

            return redirect(route('nilaiAlternatifKriterias.index'));
        }

        NilaiAlternatifKriteria::truncate();
        Alternatif::where('nilai_akhir', '!=', NULL)->update(['nilai_akhir' => NULL]);


        Flash::success('Nilai Alternatif Kriteria deleted successfully.');

        return redirect(route('nilaiAlternatifKriterias.index'));
    }
}
