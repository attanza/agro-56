<?php

namespace App\Http\Controllers;

use App\DataTables\JenisSaprotanDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateJenisSaprotanRequest;
use App\Http\Requests\UpdateJenisSaprotanRequest;
use App\Repositories\JenisSaprotanRepository;
use App\Traits\GlobalTrait;
use Flash;
use Response;

class JenisSaprotanController extends AppBaseController
{
    use GlobalTrait;
    /** @var  JenisSaprotanRepository */
    private $jenisSaprotanRepository;

    public function __construct(JenisSaprotanRepository $jenisSaprotanRepo)
    {
        $this->jenisSaprotanRepository = $jenisSaprotanRepo;
    }

    /**
     * Display a listing of the JenisSaprotan.
     *
     * @param JenisSaprotanDataTable $jenisSaprotanDataTable
     * @return Response
     */
    public function index(JenisSaprotanDataTable $jenisSaprotanDataTable)
    {
        return $jenisSaprotanDataTable->render('jenis_saprotans.index');
    }

    /**
     * Show the form for creating a new JenisSaprotan.
     *
     * @return Response
     */
    public function create()
    {
        return view('jenis_saprotans.create');
    }

    /**
     * Store a newly created JenisSaprotan in storage.
     *
     * @param CreateJenisSaprotanRequest $request
     *
     * @return Response
     */
    public function store(CreateJenisSaprotanRequest $request)
    {
        $input = $request->all();

        $jenisSaprotan = $this->jenisSaprotanRepository->create($input);

        // Save Activity
        $activity = "Menambahkan jenis saprotan $jenisSaprotan->nama";
        $this->saveActivity($request, $activity);
        Flash::success(config('agro.form_create_success'));

        return redirect(route('jenisSaprotans.index'));
    }

    /**
     * Display the specified JenisSaprotan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jenisSaprotan = $this->jenisSaprotanRepository->findWithoutFail($id);

        if (empty($jenisSaprotan)) {
            Flash::error(config('agro.db_not_found'));

            return redirect(route('jenisSaprotans.index'));
        }

        return view('jenis_saprotans.show')->with('jenisSaprotan', $jenisSaprotan);
    }

    /**
     * Show the form for editing the specified JenisSaprotan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jenisSaprotan = $this->jenisSaprotanRepository->findWithoutFail($id);

        if (empty($jenisSaprotan)) {
            Flash::error(config('agro.db_not_found'));

            return redirect(route('jenisSaprotans.index'));
        }

        return view('jenis_saprotans.edit')->with('jenisSaprotan', $jenisSaprotan);
    }

    /**
     * Update the specified JenisSaprotan in storage.
     *
     * @param  int              $id
     * @param UpdateJenisSaprotanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJenisSaprotanRequest $request)
    {
        $jenisSaprotan = $this->jenisSaprotanRepository->findWithoutFail($id);

        if (empty($jenisSaprotan)) {
            Flash::error(config('agro.db_not_found'));

            return redirect(route('jenisSaprotans.index'));
        }

        $jenisSaprotan = $this->jenisSaprotanRepository->update($request->all(), $id);
        // Save Activity
        $activity = "Memperbaharui jenis saprotan $jenisSaprotan->nama";
        $this->saveActivity($request, $activity);
        Flash::success(config('agro.form_update_success'));

        return redirect(route('jenisSaprotans.index'));
    }

    /**
     * Remove the specified JenisSaprotan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jenisSaprotan = $this->jenisSaprotanRepository->findWithoutFail($id);

        if (empty($jenisSaprotan)) {
            Flash::error(config('agro.db_not_found'));

            return redirect(route('jenisSaprotans.index'));
        }

        $this->jenisSaprotanRepository->delete($id);

        Flash::success(config('agro.form_delete_success'));

        return redirect(route('jenisSaprotans.index'));
    }
}
