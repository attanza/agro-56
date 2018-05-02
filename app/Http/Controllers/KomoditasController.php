<?php

namespace App\Http\Controllers;

use App\DataTables\KomoditasDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateKomoditasRequest;
use App\Http\Requests\UpdateKomoditasRequest;
use App\Repositories\KomoditasRepository;
use App\Traits\GlobalTrait;
use Flash;
use Illuminate\Http\Request;
use Response;

class KomoditasController extends AppBaseController
{
    use GlobalTrait;
    /** @var  KomoditasRepository */
    private $komoditasRepository;

    public function __construct(KomoditasRepository $komoditasRepo)
    {
        $this->komoditasRepository = $komoditasRepo;
    }

    /**
     * Display a listing of the Komoditas.
     *
     * @param KomoditasDataTable $komoditasDataTable
     * @return Response
     */
    public function index(KomoditasDataTable $komoditasDataTable)
    {
        return $komoditasDataTable->render('komoditas.index');
    }

    /**
     * Show the form for creating a new Komoditas.
     *
     * @return Response
     */
    public function create()
    {
        return view('komoditas.create');
    }

    /**
     * Store a newly created Komoditas in storage.
     *
     * @param CreateKomoditasRequest $request
     *
     * @return Response
     */
    public function store(CreateKomoditasRequest $request)
    {
        $input = $request->all();

        $komoditas = $this->komoditasRepository->create($input);

        // Save Activity
        $activity = "Menambahkan Komoditas $komoditas->name";
        $this->saveActivity($request, $activity);
        Flash::success(config('agro.form_create_success'));

        return redirect(route('komoditas.index'));
    }

    /**
     * Display the specified Komoditas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $komoditas = $this->komoditasRepository->findWithoutFail($id);

        if (empty($komoditas)) {
            Flash::error(config('agro.db_not_found'));

            return redirect(route('komoditas.index'));
        }

        return view('komoditas.show')->with('komoditas', $komoditas);
    }

    /**
     * Show the form for editing the specified Komoditas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $komoditas = $this->komoditasRepository->findWithoutFail($id);

        if (empty($komoditas)) {
            Flash::error(config('agro.db_not_found'));

            return redirect(route('komoditas.index'));
        }

        return view('komoditas.edit')->with('komoditas', $komoditas);
    }

    /**
     * Update the specified Komoditas in storage.
     *
     * @param  int              $id
     * @param UpdateKomoditasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKomoditasRequest $request)
    {
        $komoditas = $this->komoditasRepository->findWithoutFail($id);

        if (empty($komoditas)) {
            Flash::error(config('agro.db_not_found'));

            return redirect(route('komoditas.index'));
        }

        $komoditas = $this->komoditasRepository->update($request->all(), $id);

        $activity = "Memperbaharui komoditas $komoditas->name";
        $this->saveActivity($request, $activity);
        Flash::success(config('agro.form_update_success'));

        return redirect(route('komoditas.index'));
    }

    /**
     * Remove the specified Komoditas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        $komoditas = $this->komoditasRepository->findWithoutFail($id);

        if (empty($komoditas)) {
            Flash::error(config('agro.db_not_found'));

            return redirect(route('komoditas.index'));
        }
        $activity = "Menghapus komoditas $komoditas->nama";
        $this->saveActivity($request, $activity);
        $this->komoditasRepository->delete($id);
        Flash::success(config('agro.form_delete_success'));
        return redirect(route('komoditas.index'));
    }
}
