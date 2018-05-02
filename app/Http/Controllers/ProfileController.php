<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\User;
use Auth;
use Flash;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index')->withUser(Auth::user());
    }

    public function edit($id)
    {
        return view('profile.edit')->withUser(Auth::user());
    }

    public function changePasswordForm($id)
    {
        return view('profile.change_password')->withUser(Auth::user());
    }

    public function updatePassword(ChangePasswordRequest $request, $id)
    {
        $user = Auth::user();
        if (!Hash::check($request->password_lama, $user->password)) {
            Flash::error('Password Lama tidak cocok');
            return redirect()->back();
        }
        $user->password = bcrypt($request->password);
        $user->save();
        Flash::success('Password diperbaharui');
        return redirect('/profile');
    }
}
