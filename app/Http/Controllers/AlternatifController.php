<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAlternatifRequest;
use App\Http\Requests\UpdateAlternatifRequest;
use App\Kecamatan;
use App\Models\Alternatif;
use App\Models\NilaiAlternatifKriteria;
use App\Models\NilaiKriteria;
use App\Repositories\AlternatifRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\DB;

class AlternatifController extends AppBaseController
{
    /** @var  AlternatifRepository */
    private $alternatifRepository;

    public function __construct(AlternatifRepository $alternatifRepo)
    {
        $this->alternatifRepository = $alternatifRepo;
    }

    /**
     * Display a listing of the Alternatif.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->alternatifRepository->pushCriteria(new RequestCriteria($request));
        $alternatifs = $this->alternatifRepository->all();
        $kecamatans = Kecamatan::all();

        return view('alternatifs.index', compact('alternatifs', 'kecamatans'));
    }

    /**
     * Show the form for creating a new Alternatif.
     *
     * @return Response
     */
    public function create()
    {
        $pilihKec = Kecamatan::all()->pluck('nama_kec', 'id');
        return view('alternatifs.create', compact('pilihKec'));
    }

    /**
     * Store a newly created Alternatif in storage.
     *
     * @param CreateAlternatifRequest $request
     *
     * @return Response
     */
    public function store(CreateAlternatifRequest $request)
    {
        $input = $request->all();

        $alternatif = $this->alternatifRepository->create($input);

        Flash::success('Alternatif saved successfully.');

        return redirect(route('alternatifs.index'));
    }

    /**
     * Display the specified Alternatif.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $alternatif = $this->alternatifRepository->findWithoutFail($id);

        if (empty($alternatif)) {
            Flash::error('Alternatif not found');

            return redirect(route('alternatifs.index'));
        }

        return view('alternatifs.show')->with('alternatif', $alternatif);
    }

    /**
     * Show the form for editing the specified Alternatif.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $alternatif = $this->alternatifRepository->findWithoutFail($id);

        if (empty($alternatif)) {
            Flash::error('Alternatif not found');

            return redirect(route('alternatifs.index'));
        }

        return view('alternatifs.edit')->with('alternatif', $alternatif);
    }

    /**
     * Update the specified Alternatif in storage.
     *
     * @param  int              $id
     * @param UpdateAlternatifRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAlternatifRequest $request)
    {
        $alternatif = $this->alternatifRepository->findWithoutFail($id);

        if (empty($alternatif)) {
            Flash::error('Alternatif not found');

            return redirect(route('alternatifs.index'));
        }

        $alternatif = $this->alternatifRepository->update($request->all(), $id);

        Flash::success('Alternatif updated successfully.');

        return redirect(route('alternatifs.index'));
    }

    /**
     * Remove the specified Alternatif from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $alternatif = $this->alternatifRepository->findWithoutFail($id);

        if (empty($alternatif)) {
            Flash::error('Alternatif not found');

            return redirect(route('alternatifs.index'));
        }

        $this->alternatifRepository->delete($id);

        Flash::success('Alternatif deleted successfully.');

        return redirect(route('alternatifs.index'));
    }

    public function hapus()
    {
        $alternatif = $this->alternatifRepository->all();

        if (empty($alternatif)) {
            Flash::error('Alternatif not found');

            return redirect(route('alternatifs.index'));
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Alternatif::truncate();
        NilaiKriteria::truncate();
        NilaiAlternatifKriteria::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Flash::success('Alternatif deleted successfully.');

        return redirect(route('alternatifs.index'));
    }

}
