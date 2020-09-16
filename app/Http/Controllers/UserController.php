<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function editUser(Request $req)
    {
        $user = User::find($req->user_id);
        return view('edit-profile', compact('user'));
    }

    public function saveProfile(Request $req)
    {

        $user = User::where('id', '=', $req->user_id)->first();
        $user->name = $req->input('name');

        $user->save();

        return redirect()->route('main')->with('success', 'Профиль успешно изменен');
    }
}
