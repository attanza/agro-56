<?php

namespace App\Http\Controllers;

use App\DataTables\PanenDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePanenRequest;
use App\Http\Requests\UpdatePanenRequest;
use App\Repositories\PanenRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Traits\GlobalTrait;
use App\Models\Penggarap;
use App\Models\Komoditas;

class PanenController extends AppBaseController
{
    use GlobalTrait;
    
    /** @var  PanenRepository */
    private $panenRepository;

    public function __construct(PanenRepository $panenRepo)
    {
        $this->panenRepository = $panenRepo;
    }

    /**
     * Display a listing of the Panen.
     *
     * @param PanenDataTable $panenDataTable
     * @return Response
     */
    public function index(PanenDataTable $panenDataTable)
    {
        return $panenDataTable->render('panens.index');
    }

    /**
     * Show the form for creating a new Panen.
     *
     * @return Response
     */
    public function create()
    {
        $penggaraps = Penggarap::select('id', 'nama')->orderBy('nama')->get();
        $komoditas = Komoditas::select('id', 'nama')->orderBy('nama')->get();        
        return view('panens.create')->with([
            'penggaraps' => $penggaraps,
            'komoditas' => $komoditas,
        ]);
    }

    /**
     * Store a newly created Panen in storage.
     *
     * @param CreatePanenRequest $request
     *
     * @return Response
     */
    public function store(CreatePanenRequest $request)
    {
        $input = $request->all();

        $panen = $this->panenRepository->create($input);

        // Save Activity
        $activity = "Menambahkan Data Panen $panen->name";
        $this->saveActivity($request, $activity);
        Flash::success(config('agro.form_create_success'));

        return redirect(route('panens.index'));
    }

    /**
     * Display the specified Panen.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $panen = $this->panenRepository->findWithoutFail($id);

        if (empty($panen)) {
            Flash::error('Panen not found');

            return redirect(route('panens.index'));
        }

        return view('panens.show')->with('panen', $panen);
    }

    /**
     * Show the form for editing the specified Panen.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $panen = $this->panenRepository->findWithoutFail($id);

        if (empty($panen)) {
            Flash::error('Panen not found');

            return redirect(route('panens.index'));
        }
        $penggaraps = Penggarap::select('id', 'nama')->orderBy('nama')->get();
        $komoditas = Komoditas::select('id', 'nama')->orderBy('nama')->get();   

        return view('panens.edit')->with([
            'panen' => $panen,
            'penggaraps' => $penggaraps,
            'komoditas' => $komoditas,
        ]);
    }

    /**
     * Update the specified Panen in storage.
     *
     * @param  int              $id
     * @param UpdatePanenRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePanenRequest $request)
    {
        $panen = $this->panenRepository->findWithoutFail($id);

        if (empty($panen)) {
            Flash::error('Panen not found');

            return redirect(route('panens.index'));
        }

        $panen = $this->panenRepository->update($request->all(), $id);

        // Save Activity
        $activity = "Memperbaharui Data Panen $panen->name";
        $this->saveActivity($request, $activity);
        Flash::success(config('agro.form_update_success'));

        return redirect(route('panens.index'));
    }

    /**
     * Remove the specified Panen from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $panen = $this->panenRepository->findWithoutFail($id);

        if (empty($panen)) {
            Flash::error('Panen not found');

            return redirect(route('panens.index'));
        }

        // Save Activity
        $activity = "Menghapus Data Panen $panen->name";
        $this->saveActivity($request, $activity);
        
        $this->panenRepository->delete($id);
        
        Flash::success(config('agro.form_delete_success'));

        return redirect(route('panens.index'));
    }
}
