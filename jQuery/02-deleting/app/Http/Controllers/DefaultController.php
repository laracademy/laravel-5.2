<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;


class DefaultController extends Controller
{
    public function index()
    {
        return view('list', [
            'users' => User::orderBy('name')->get()
        ]);
    }

    public function delete(\App\User $user)
    {
        return response()->json([
            'delete' => true,
            'user' => $user,
        ]);
        //return $user;

        $user->delete();

        return redirect()->back()->with('success', 'The user has been deleted');
    }
}
