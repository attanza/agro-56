<?php

namespace App\Http\Controllers;

use App\DataTables\PasanganDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreatePasanganRequest;
use App\Http\Requests\UpdatePasanganRequest;
use App\Models\Penggarap;
use App\Repositories\PasanganRepository;
use App\Traits\GlobalTrait;
use App\Traits\SaveFileTrait;
use Flash;
use Response;

class PasanganController extends AppBaseController
{
    use SaveFileTrait, GlobalTrait;

    /** @var  PasanganRepository */
    private $pasanganRepository;

    public function __construct(PasanganRepository $pasanganRepo)
    {
        $this->pasanganRepository = $pasanganRepo;
    }

    /**
     * Display a listing of the Pasangan.
     *
     * @param PasanganDataTable $pasanganDataTable
     * @return Response
     */
    public function index(PasanganDataTable $pasanganDataTable)
    {
        return $pasanganDataTable->render('pasangans.index');
    }

    /**
     * Show the form for creating a new Pasangan.
     *
     * @return Response
     */
    public function create()
    {
        $penggaraps = Penggarap::select('id', 'nama')->doesntHave('pasangan')->orderBy('nama')->get();
        return view('pasangans.create')->withPenggaraps($penggaraps);
    }

    /**
     * Store a newly created Pasangan in storage.
     *
     * @param CreatePasanganRequest $request
     *
     * @return Response
     */
    public function store(CreatePasanganRequest $request)
    {
        $input = $request->all();

        $pasangan = $this->pasanganRepository->create($input);

        $this->checkFile($request, 'photo', 'penggarap', $pasangan);
        $this->checkFile($request, 'ktp_file', 'penggarap', $pasangan);
        $this->checkFile($request, 'surat_nikah_file', 'penggarap', $pasangan);
        $pasangan->save();
        // Save Activity
        $activity = "Menambahkan Data Pasangan $pasangan->name";
        $this->saveActivity($request, $activity);
        Flash::success(config('agro.form_create_success'));

        return redirect(route('pasangans.index'));
    }

    /**
     * Display the specified Pasangan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pasangan = $this->pasanganRepository->findWithoutFail($id);

        if (empty($pasangan)) {
            Flash::error('Pasangan not found');

            return redirect(route('pasangans.index'));
        }

        return view('pasangans.show')->with('pasangan', $pasangan);
    }

    /**
     * Show the form for editing the specified Pasangan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pasangan = $this->pasanganRepository->findWithoutFail($id);
        $penggaraps = Penggarap::select('id', 'nama')->doesntHave('pasangan')->orderBy('nama')->get();
        $currentPenggarap = Penggarap::select('id', 'nama')->find($pasangan->penggarap_id);
        $penggaraps->push($currentPenggarap);
        if (empty($pasangan)) {
            Flash::error('Pasangan not found');

            return redirect(route('pasangans.index'));
        }

        return view('pasangans.edit')->with('pasangan', $pasangan)->withPenggaraps($penggaraps);
    }

    /**
     * Update the specified Pasangan in storage.
     *
     * @param  int              $id
     * @param UpdatePasanganRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePasanganRequest $request)
    {
        $pasangan = $this->pasanganRepository->findWithoutFail($id);

        if (empty($pasangan)) {
            Flash::error('Pasangan not found');

            return redirect(route('pasangans.index'));
        }

        $pasangan = $this->pasanganRepository->update($request->all(), $id);
        $this->checkFile($request, 'photo', 'penggarap', $pasangan);
        $this->checkFile($request, 'ktp_file', 'penggarap', $pasangan);
        $this->checkFile($request, 'surat_nikah_file', 'penggarap', $pasangan);
        $pasangan->save();
        // Save Activity
        $activity = "Memperbaharui Data Pasangan $pasangan->name";
        $this->saveActivity($request, $activity);
        Flash::success(config('agro.form_update_success'));

        return redirect(route('pasangans.index'));
    }

    /**
     * Remove the specified Pasangan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pasangan = $this->pasanganRepository->findWithoutFail($id);

        if (empty($pasangan)) {
            Flash::error('Pasangan not found');

            return redirect(route('pasangans.index'));
        }

        // Save Activity
        $activity = "Menghapus Data Pasangan $pasangan->name";
        $this->saveActivity($request, $activity);

        $this->pasanganRepository->delete($id);

        Flash::success(config('agro.form_delete_success'));

        return redirect(route('pasangans.index'));
    }
}
