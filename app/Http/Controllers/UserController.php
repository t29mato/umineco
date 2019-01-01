<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function edit()
    {
        $user = \Auth::user();
        return view('settings.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $userId = \Auth::id();
        $user = User::find($userId)->update($request->all());
        return redirect(route('settings.profile'));
    }
}
