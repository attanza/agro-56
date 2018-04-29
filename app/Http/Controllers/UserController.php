<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Repositories\UserRepository;
use App\Traits\GlobalTrait;
use App\Traits\SaveFileTrait;
use Flash;
use Illuminate\Http\Request;
use Response;
use Auth;

class UserController extends AppBaseController
{
    use SaveFileTrait, GlobalTrait;

    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param UserDataTable $userDataTable
     * @return Response
     */
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('users.index');
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::select('id', 'nama')->orderBy('nama')->get();
        return view('users.create')->withRoles($roles);
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        $randomPassord = str_random(6);
        $password = bcrypt($randomPassord);
        $input['password'] = $password;
        $user = $this->userRepository->create($input);
        $this->checkFile($request, 'photo', 'user', $user);
        $user->save();
        // Save Activity
        $activity = "Menambahkan User $user->name";
        $this->saveActivity($request, $activity);
        Flash::success(config('agro.form_create_success'));
        // TODO Send email
        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->findWithoutFail($id);
        if (empty($user)) {
            Flash::error('User tidak ditemukan');
            return redirect(route('users.index'));
        }
        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->findWithoutFail($id);
        $roles = Role::select('id', 'nama')->orderBy('nama')->get();
        if (empty($user)) {
            Flash::error('User tidak ditemukan');
            return redirect(route('users.index'));
        }
        return view('users.edit')->with('user', $user)->withRoles($roles);
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int              $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->findWithoutFail($id);
        if (empty($user)) {
            Flash::error('User not found');
            return redirect(route('users.index'));
        }
        $user = $this->userRepository->update($request->all(), $id);
        $this->checkFile($request, 'photo', 'user', $user);
        $user->save();
        $activity = "Memperbaharui User $user->name";
        $this->saveActivity($request, $activity);
        Flash::success(config('agro.form_update_success'));
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User tidak ditemukan');
            return redirect(route('users.index'));
        }
        $activity = "Menghapus User $user->name";
        $this->saveActivity($request, $activity);
        $this->userRepository->delete($id);
        Flash::success(config('agro.form_delete_success'));
        return redirect(route('users.index'));
    }
}
