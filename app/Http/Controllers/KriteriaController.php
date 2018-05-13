<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKriteriaRequest;
use App\Http\Requests\UpdateKriteriaRequest;
use App\Models\Kriteria;
use App\Models\NilaiAlternatifKriteria;
use App\Models\NilaiKriteria;
use App\Repositories\KriteriaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\DB;

class KriteriaController extends AppBaseController
{
    /** @var  KriteriaRepository */
    private $kriteriaRepository;

    public function __construct(KriteriaRepository $kriteriaRepo)
    {
        $this->kriteriaRepository = $kriteriaRepo;
    }

    /**
     * Display a listing of the Kriteria.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->kriteriaRepository->pushCriteria(new RequestCriteria($request));
        $kriterias = $this->kriteriaRepository->all();

        return view('kriterias.index')
            ->with('kriterias', $kriterias);
    }

    /**
     * Show the form for creating a new Kriteria.
     *
     * @return Response
     */
    public function create()
    {
        return view('kriterias.create');
    }

    /**
     * Store a newly created Kriteria in storage.
     *
     * @param CreateKriteriaRequest $request
     *
     * @return Response
     */
    public function store(CreateKriteriaRequest $request)
    {
        $input = $request->all();

        $kriteria = $this->kriteriaRepository->create($input);

        Flash::success('Kriteria saved successfully.');

        return redirect(route('kriterias.index'));
    }

    /**
     * Display the specified Kriteria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kriteria = $this->kriteriaRepository->findWithoutFail($id);

        if (empty($kriteria)) {
            Flash::error('Kriteria not found');

            return redirect(route('kriterias.index'));
        }

        return view('kriterias.show')->with('kriteria', $kriteria);
    }

    /**
     * Show the form for editing the specified Kriteria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kriteria = $this->kriteriaRepository->findWithoutFail($id);

        if (empty($kriteria)) {
            Flash::error('Kriteria not found');

            return redirect(route('kriterias.index'));
        }

        return view('kriterias.edit')->with('kriteria', $kriteria);
    }

    /**
     * Update the specified Kriteria in storage.
     *
     * @param  int              $id
     * @param UpdateKriteriaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKriteriaRequest $request)
    {
        $kriteria = $this->kriteriaRepository->findWithoutFail($id);

        if (empty($kriteria)) {
            Flash::error('Kriteria not found');

            return redirect(route('kriterias.index'));
        }

        $kriteria = $this->kriteriaRepository->update($request->all(), $id);

        Flash::success('Kriteria updated successfully.');

        return redirect(route('kriterias.index'));
    }

    /**
     * Remove the specified Kriteria from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kriteria = $this->kriteriaRepository->findWithoutFail($id);

        if (empty($kriteria)) {
            Flash::error('Kriteria not found');

            return redirect(route('kriterias.index'));
        }

        $this->kriteriaRepository->delete($id);

        Flash::success('Kriteria deleted successfully.');

        return redirect(route('kriterias.index'));
    }

    public function hapus()
    {
        $kriteria = $this->kriteriaRepository->all();

        if (empty($kriteria)) {
            Flash::error('Kriteria not found');

            return redirect(route('kriterias.index'));
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Kriteria::truncate();
        NilaiKriteria::truncate();
        NilaiAlternatifKriteria::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Flash::success('Kriteria deleted successfully.');

        return redirect(route('kriterias.index'));
    }
}
