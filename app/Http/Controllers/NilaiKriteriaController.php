<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNilaiKriteriaRequest;
use App\Http\Requests\UpdateNilaiKriteriaRequest;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiKriteria;
use App\Repositories\NilaiKriteriaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class NilaiKriteriaController extends AppBaseController
{
    /** @var  NilaiKriteriaRepository */
    private $nilaiKriteriaRepository;

    public function __construct(NilaiKriteriaRepository $nilaiKriteriaRepo)
    {
        $this->nilaiKriteriaRepository = $nilaiKriteriaRepo;
    }

    /**
     * Display a listing of the NilaiKriteria.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->nilaiKriteriaRepository->pushCriteria(new RequestCriteria($request));
        $nilaiKriterias = $this->nilaiKriteriaRepository->all();

        return view('nilai_kriterias.index')
            ->with('nilaiKriterias', $nilaiKriterias);
    }

    /**
     * Show the form for creating a new NilaiKriteria.
     *
     * @return Response
     */
    public function create()
    {
        $kriterias = Kriteria::get(['id', 'nama_kriteria'])->toArray();

        return view('nilai_kriterias.create', compact('kriterias'));
    }

    /**
     * Store a newly created NilaiKriteria in storage.
     *
     * @param CreateNilaiKriteriaRequest $request
     *
     * @return Response
     */
    public function store(CreateNilaiKriteriaRequest $request)
    {
        $allData = $request->all();

        $n = count($allData['kriteria_1_id']);
        for($i=0; $i < $n; $i++){
            $input['kriteria_1_id'] = $request->kriteria_1_id[$i];
            $input['kriteria_2_id']= $request->kriteria_2_id[$i];
            $input['bobot_kriteria']= $request->bobot_kriteria[$i];

            $nilaiKriteria = $this->nilaiKriteriaRepository->create($input);
        }

        $i =0;

        $kriterias = Kriteria::get();
        foreach ($kriterias as $kriteria) {
            $sumA[] = NilaiKriteria::where('kriteria_2_id', $kriteria->id)->sum('bobot_kriteria');

            $nilaiKriterias = nilaiKriteria::where('kriteria_2_id', $kriteria->id)->get();

            foreach($nilaiKriterias as $nilaiKriteria){
                $normKriteria = $nilaiKriteria->bobot_kriteria/$sumA[$i];

                $updateNorm = NilaiKriteria::where('id', '=', $nilaiKriteria->id)
                                ->update(['norm_kriteria' => $normKriteria]);

            }
            $i++;



            $rataKriteria = NilaiKriteria::where('kriteria_1_id', '=', $kriteria->id)->avg('norm_kriteria');
            $updateRataKriteria = Kriteria::where('id', '=', $kriteria->id)
                                ->update(['rata_kriteria' => $rataKriteria]);
        }

        Flash::success('Nilai Kriteria saved successfully.');

        return redirect(route('nilaiKriterias.index'));
    }

    /**
     * Display the specified NilaiKriteria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nilaiKriteria = $this->nilaiKriteriaRepository->findWithoutFail($id);

        if (empty($nilaiKriteria)) {
            Flash::error('Nilai Kriteria not found');

            return redirect(route('nilaiKriterias.index'));
        }

        return view('nilai_kriterias.show')->with('nilaiKriteria', $nilaiKriteria);
    }

    /**
     * Show the form for editing the specified NilaiKriteria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nilaiKriteria = $this->nilaiKriteriaRepository->findWithoutFail($id);

        if (empty($nilaiKriteria)) {
            Flash::error('Nilai Kriteria not found');

            return redirect(route('nilaiKriterias.index'));
        }

        return view('nilai_kriterias.edit')->with('nilaiKriteria', $nilaiKriteria);
    }

    /**
     * Update the specified NilaiKriteria in storage.
     *
     * @param  int              $id
     * @param UpdateNilaiKriteriaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNilaiKriteriaRequest $request)
    {
        $nilaiKriteria = $this->nilaiKriteriaRepository->findWithoutFail($id);

        if (empty($nilaiKriteria)) {
            Flash::error('Nilai Kriteria not found');

            return redirect(route('nilaiKriterias.index'));
        }

        $nilaiKriteria = $this->nilaiKriteriaRepository->update($request->all(), $id);

        Flash::success('Nilai Kriteria updated successfully.');

        return redirect(route('nilaiKriterias.index'));
    }

    /**
     * Remove the specified NilaiKriteria from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nilaiKriteria = $this->nilaiKriteriaRepository->findWithoutFail($id);

        if (empty($nilaiKriteria)) {
            Flash::error('Nilai Kriteria not found');

            return redirect(route('nilaiKriterias.index'));
        }

        $this->nilaiKriteriaRepository->delete($id);

        Flash::success('Nilai Kriteria deleted successfully.');

        return redirect(route('nilaiKriterias.index'));
    }

    public function hapus()
    {
        $nilaiKriteria = $this->nilaiKriteriaRepository->all();

        if (empty($nilaiKriteria)) {
            Flash::error('Nilai Kriteria not found');

            return redirect(route('nilaiKriterias.index'));
        }

        NilaiKriteria::truncate();
        Kriteria::where('rata_kriteria', '!=', NULL)->update(['rata_kriteria' => NULL]);


        Flash::success('Nilai Kriteria deleted successfully.');

        return redirect(route('nilaiKriterias.index'));
    }
}
