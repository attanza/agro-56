<?php

namespace App\Http\Controllers;

use App\DataTables\PenggarapDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreatePenggarapRequest;
use App\Http\Requests\UpdatePenggarapRequest;
use App\Repositories\PenggarapRepository;
use App\Traits\GlobalTrait;
use App\Traits\SaveFileTrait;
use Flash;
use QrCode;
use Response;

class PenggarapController extends AppBaseController
{
    use SaveFileTrait, GlobalTrait;

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
        $this->checkFile($request, 'photo', 'penggarap', $penggarap);
        $this->checkFile($request, 'ktp_file', 'penggarap', $penggarap);
        $this->checkFile($request, 'kk_file', 'penggarap', $penggarap);
        $penggarap->save();
        // Save Activity
        $activity = "Menambahkan Data Penggarap $penggarap->nama";
        $this->saveActivity($request, $activity);
        Flash::success(config('agro.form_create_success'));

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
            Flash::error(config('agro.db_not_found'));

            return redirect(route('penggaraps.index'));
        }

        $qr = QrCode::size(250)->generate($penggarap->id);

        return view('penggaraps.show')->with(['penggarap' => $penggarap, 'qr' => $qr]);
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
            Flash::error(config('agro.db_not_found'));

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
            Flash::error(config('agro.db_not_found'));

            return redirect(route('penggaraps.index'));
        }

        $penggarap = $this->penggarapRepository->update($request->all(), $id);
        $this->checkFile($request, 'photo', 'penggarap', $penggarap);
        $this->checkFile($request, 'ktp_file', 'penggarap', $penggarap);
        $this->checkFile($request, 'kk_file', 'penggarap', $penggarap);
        $penggarap->save();

        // Save Activity
        $activity = "Memperbaharui Data Penggarap $penggarap->nama";
        $this->saveActivity($request, $activity);
        Flash::success(config('agro.form_update_success'));

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
            Flash::error(config('agro.db_not_found'));

            return redirect(route('penggaraps.index'));
        }
        // Save Activity
        $activity = "Menghapus Data Penggarap $penggarap->nama";
        $this->saveActivity($request, $activity);
        $this->penggarapRepository->delete($id);
        Flash::success(config('agro.form_delete_success'));
        return redirect(route('penggaraps.index'));
    }
}
