<?php

namespace App\Http\Controllers;

use Auth;
use App\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index')->withUser(Auth::user());
    }

    public function edit($id)
    {
        if (Auth::id() != $id) {
            Flash::error('Proses tidak diizinkan');
            return redirect(route('dashboards.index'));
        }
        return view('profile.edit')->withUser(Auth::user());
    }
}
