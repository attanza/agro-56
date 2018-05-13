<?php

namespace App\Http\Controllers;

use App\DataTables\LahanGarapanDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateLahanGarapanRequest;
use App\Http\Requests\UpdateLahanGarapanRequest;
use App\Models\Penggarap;
use App\Repositories\LahanGarapanRepository;
use App\Traits\GlobalTrait;
use Flash;
use Response;

class LahanGarapanController extends AppBaseController
{
    use GlobalTrait;

    /** @var  LahanGarapanRepository */
    private $lahanGarapanRepository;

    public function __construct(LahanGarapanRepository $lahanGarapanRepo)
    {
        $this->lahanGarapanRepository = $lahanGarapanRepo;
    }

    /**
     * Display a listing of the LahanGarapan.
     *
     * @param LahanGarapanDataTable $lahanGarapanDataTable
     * @return Response
     */
    public function index(LahanGarapanDataTable $lahanGarapanDataTable)
    {
        return $lahanGarapanDataTable->render('lahan_garapans.index');
    }

    /**
     * Show the form for creating a new LahanGarapan.
     *
     * @return Response
     */
    public function create()
    {
        $penggaraps = Penggarap::select('id', 'nama')->doesntHave('lahan')->orderBy('nama')->get();
        return view('lahan_garapans.create')->with([
            'penggaraps' => $penggaraps,
        ]);
    }

    /**
     * Store a newly created LahanGarapan in storage.
     *
     * @param CreateLahanGarapanRequest $request
     *
     * @return Response
     */
    public function store(CreateLahanGarapanRequest $request)
    {
        $input = $request->all();

        $lahanGarapan = $this->lahanGarapanRepository->create($input);

        // Save Activity
        $activity = "Menambahkan lahangarapan $lahanGarapan->nama";
        $this->saveActivity($request, $activity);
        Flash::success(config('agro.form_create_success'));

        return redirect(route('lahanGarapans.index'));
    }

    /**
     * Display the specified LahanGarapan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lahanGarapan = $this->lahanGarapanRepository->findWithoutFail($id);

        if (empty($lahanGarapan)) {
            Flash::error(config('agro.db_not_found'));

            return redirect(route('lahanGarapans.index'));
        }

        return view('lahan_garapans.show')->with('lahanGarapan', $lahanGarapan);
    }

    /**
     * Show the form for editing the specified LahanGarapan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lahanGarapan = $this->lahanGarapanRepository->findWithoutFail($id);

        if (empty($lahanGarapan)) {
            Flash::error(config('agro.db_not_found'));

            return redirect(route('lahanGarapans.index'));
        }

        return view('lahan_garapans.edit')->with('lahanGarapan', $lahanGarapan);
    }

    /**
     * Update the specified LahanGarapan in storage.
     *
     * @param  int              $id
     * @param UpdateLahanGarapanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLahanGarapanRequest $request)
    {
        $lahanGarapan = $this->lahanGarapanRepository->findWithoutFail($id);

        if (empty($lahanGarapan)) {
            Flash::error('Lahan Garapan not found');

            return redirect(route('lahanGarapans.index'));
        }

        $lahanGarapan = $this->lahanGarapanRepository->update($request->all(), $id);

        // Save Activity
        $activity = "Memperbaharui jenis saprotan $jenisSaprotan->nama";
        $this->saveActivity($request, $activity);
        Flash::success(config('agro.form_update_success'));

        return redirect(route('lahanGarapans.index'));
    }

    /**
     * Remove the specified LahanGarapan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lahanGarapan = $this->lahanGarapanRepository->findWithoutFail($id);

        if (empty($lahanGarapan)) {
            Flash::error(config('agro.db_not_found'));

            return redirect(route('lahanGarapans.index'));
        }

        $this->lahanGarapanRepository->delete($id);

        Flash::success(config('agro.form_delete_success'));

        return redirect(route('lahanGarapans.index'));
    }
}
