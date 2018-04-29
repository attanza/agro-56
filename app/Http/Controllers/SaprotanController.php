<?php

namespace App\Http\Controllers;

use App\DataTables\SaprotanDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateSaprotanRequest;
use App\Http\Requests\UpdateSaprotanRequest;
use App\Models\JenisSaprotan;
use App\Repositories\SaprotanRepository;
use Flash;
use Response;
use App\Traits\GlobalTrait;
use Illuminate\Http\Request;


class SaprotanController extends AppBaseController
{

    use GlobalTrait;
    
    /** @var  SaprotanRepository */
    private $saprotanRepository;

    public function __construct(SaprotanRepository $saprotanRepo)
    {
        $this->saprotanRepository = $saprotanRepo;
    }

    /**
     * Display a listing of the Saprotan.
     *
     * @param SaprotanDataTable $saprotanDataTable
     * @return Response
     */
    public function index(SaprotanDataTable $saprotanDataTable)
    {
        return $saprotanDataTable->render('saprotans.index');
    }

    /**
     * Show the form for creating a new Saprotan.
     *
     * @return Response
     */
    public function create()
    {
        $jenis = JenisSaprotan::select('id', 'nama')->orderBy('nama')->get();
        return view('saprotans.create')->withJenis($jenis);
    }

    /**
     * Store a newly created Saprotan in storage.
     *
     * @param CreateSaprotanRequest $request
     *
     * @return Response
     */
    public function store(CreateSaprotanRequest $request)
    {
        $input = $request->all();

        $saprotan = $this->saprotanRepository->create($input);

        // Save Activity
        $activity = "Menambahkan Saprotan $saprotan->nama";
        $this->saveActivity($request, $activity);
        Flash::success(config('agro.form_create_success'));

        return redirect(route('saprotans.index'));
    }

    /**
     * Display the specified Saprotan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $saprotan = $this->saprotanRepository->findWithoutFail($id);

        if (empty($saprotan)) {
            Flash::error('Saprotan not found');

            return redirect(route('saprotans.index'));
        }

        return view('saprotans.show')->with('saprotan', $saprotan);
    }

    /**
     * Show the form for editing the specified Saprotan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jenis = JenisSaprotan::select('id', 'nama')->orderBy('nama')->get();
        
        $saprotan = $this->saprotanRepository->findWithoutFail($id);

        if (empty($saprotan)) {
            Flash::error('Saprotan not found');

            return redirect(route('saprotans.index'));
        }

        return view('saprotans.edit')->with(['saprotan' => $saprotan, 'jenis' => $jenis]);
    }

    /**
     * Update the specified Saprotan in storage.
     *
     * @param  int              $id
     * @param UpdateSaprotanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSaprotanRequest $request)
    {
        $saprotan = $this->saprotanRepository->findWithoutFail($id);

        if (empty($saprotan)) {
            Flash::error('Saprotan not found');

            return redirect(route('saprotans.index'));
        }

        $saprotan = $this->saprotanRepository->update($request->all(), $id);

        $activity = "Memperbaharui Saprotan $saprotan->nama";
        $this->saveActivity($request, $activity);
        Flash::success(config('agro.form_update_success'));

        return redirect(route('saprotans.index'));
    }

    /**
     * Remove the specified Saprotan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $saprotan = $this->saprotanRepository->findWithoutFail($id);

        if (empty($saprotan)) {
            Flash::error('Saprotan not found');

            return redirect(route('saprotans.index'));
        }
        $activity = "Menghapus saprotan $saprotan->nama";
        $this->saveActivity($request, $activity);
        $this->saprotanRepository->delete($id);
        Flash::success(config('agro.form_delete_success'));
        return redirect(route('saprotans.index'));
    }
}
