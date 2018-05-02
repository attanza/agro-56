<?php

namespace App\Http\Controllers;

use App\DataTables\VendorDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateVendorRequest;
use App\Http\Requests\UpdateVendorRequest;
use App\Models\JenisSaprotan;
use App\Repositories\VendorRepository;
use App\Traits\GlobalTrait;
use App\Traits\SaveFileTrait;
use Flash;
use Response;

class VendorController extends AppBaseController
{
    use SaveFileTrait, GlobalTrait;

    /** @var  VendorRepository */
    private $vendorRepository;

    public function __construct(VendorRepository $vendorRepo)
    {
        $this->vendorRepository = $vendorRepo;
    }

    /**
     * Display a listing of the Vendor.
     *
     * @param VendorDataTable $vendorDataTable
     * @return Response
     */
    public function index(VendorDataTable $vendorDataTable)
    {
        return $vendorDataTable->render('vendors.index');
    }

    /**
     * Show the form for creating a new Vendor.
     *
     * @return Response
     */
    public function create()
    {
        $jenis = JenisSaprotan::select('id', 'nama')->orderBy('nama')->get();
        return view('vendors.create')->withJenis($jenis);
    }

    /**
     * Store a newly created Vendor in storage.
     *
     * @param CreateVendorRequest $request
     *
     * @return Response
     */
    public function store(CreateVendorRequest $request)
    {
        $input = $request->all();

        $vendor = $this->vendorRepository->create($input);
        $this->checkFile($request, 'npwp_file', 'vendor', $vendor);
        $this->checkFile($request, 'siup_file', 'vendor', $vendor);
        $this->checkFile($request, 'tdp_file', 'vendor', $vendor);
        $vendor->save();

        // Save Activity
        $activity = "Menambahkan Data Vendor $vendor->nama";
        $this->saveActivity($request, $activity);
        Flash::success(config('agro.form_create_success'));

        return redirect(route('vendors.index'));
    }

    /**
     * Display the specified Vendor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {

        $vendor = $this->vendorRepository->findWithoutFail($id);

        if (empty($vendor)) {
            Flash::error(config('agro.db_not_found'));

            return redirect(route('vendors.index'));
        }

        return view('vendors.show')->with('vendor', $vendor);
    }

    /**
     * Show the form for editing the specified Vendor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jenis = JenisSaprotan::select('id', 'nama')->orderBy('nama')->get();

        $vendor = $this->vendorRepository->findWithoutFail($id);

        if (empty($vendor)) {
            Flash::error(config('agro.db_not_found'));

            return redirect(route('vendors.index'));
        }

        return view('vendors.edit')->with('vendor', $vendor)->withJenis($jenis);
    }

    /**
     * Update the specified Vendor in storage.
     *
     * @param  int              $id
     * @param UpdateVendorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVendorRequest $request)
    {
        $vendor = $this->vendorRepository->findWithoutFail($id);

        if (empty($vendor)) {
            Flash::error(config('agro.db_not_found'));

            return redirect(route('vendors.index'));
        }

        $vendor = $this->vendorRepository->update($request->all(), $id);

        $this->checkFile($request, 'npwp_file', 'vendor', $vendor);
        $this->checkFile($request, 'siup_file', 'vendor', $vendor);
        $this->checkFile($request, 'tdp_file', 'vendor', $vendor);
        $vendor->save();

        // Save Activity
        $activity = "Memperbaharui Data Vendor $vendor->nama";
        $this->saveActivity($request, $activity);
        Flash::success(config('agro.form_update_success'));

        return redirect(route('vendors.index'));
    }

    /**
     * Remove the specified Vendor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vendor = $this->vendorRepository->findWithoutFail($id);

        if (empty($vendor)) {
            Flash::error(config('agro.db_not_found'));

            return redirect(route('vendors.index'));
        }

        // Save Activity
        $activity = "Memperbaharui Data Vendor $vendor->nama";
        $this->saveActivity($request, $activity);
        $this->vendorRepository->delete($id);

        Flash::success(config('agro.form_delete_success'));

        return redirect(route('vendors.index'));
    }
}
