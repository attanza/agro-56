<?php

namespace App\Http\Controllers;

use App\DataTables\PenggarapDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePenggarapRequest;
use App\Http\Requests\UpdatePenggarapRequest;
use App\Repositories\PenggarapRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PenggarapController extends AppBaseController
{
    /** @var  PenggarapRepository */
    private $penggarapRepository;

    public function __construct(PenggarapRepository $penggarapRepo)
    {
        $this->penggarapRepository = $penggarapRepo;
    }

    /**
     * Display a listing of the Penggarap.
     *
     * @param PenggarapDataTable $penggarapDataTable
     * @return Response
     */
    public function index(PenggarapDataTable $penggarapDataTable)
    {
        return $penggarapDataTable->render('penggaraps.index');
    }

    /**
     * Show the form for creating a new Penggarap.
     *
     * @return Response
     */
    public function create()
    {
        return view('penggaraps.create');
    }

    /**
     * Store a newly created Penggarap in storage.
     *
     * @param CreatePenggarapRequest $request
     *
     * @return Response
     */
    public function store(CreatePenggarapRequest $request)
    {
        $input = $request->all();

        $penggarap = $this->penggarapRepository->create($input);

        Flash::success('Penggarap saved successfully.');

        return redirect(route('penggaraps.index'));
    }

    /**
     * Display the specified Penggarap.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $penggarap = $this->penggarapRepository->findWithoutFail($id);

        if (empty($penggarap)) {
            Flash::error('Penggarap not found');

            return redirect(route('penggaraps.index'));
        }

        return view('penggaraps.show')->with('penggarap', $penggarap);
    }

    /**
     * Show the form for editing the specified Penggarap.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $penggarap = $this->penggarapRepository->findWithoutFail($id);

        if (empty($penggarap)) {
            Flash::error('Penggarap not found');

            return redirect(route('penggaraps.index'));
        }

        return view('penggaraps.edit')->with('penggarap', $penggarap);
    }

    /**
     * Update the specified Penggarap in storage.
     *
     * @param  int              $id
     * @param UpdatePenggarapRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePenggarapRequest $request)
    {
        $penggarap = $this->penggarapRepository->findWithoutFail($id);

        if (empty($penggarap)) {
            Flash::error('Penggarap not found');

            return redirect(route('penggaraps.index'));
        }

        $penggarap = $this->penggarapRepository->update($request->all(), $id);

        Flash::success('Penggarap updated successfully.');

        return redirect(route('penggaraps.index'));
    }

    /**
     * Remove the specified Penggarap from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $penggarap = $this->penggarapRepository->findWithoutFail($id);

        if (empty($penggarap)) {
            Flash::error('Penggarap not found');

            return redirect(route('penggaraps.index'));
        }

        $this->penggarapRepository->delete($id);

        Flash::success('Penggarap deleted successfully.');

        return redirect(route('penggaraps.index'));
    }
}
