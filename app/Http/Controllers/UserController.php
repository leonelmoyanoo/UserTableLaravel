<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        /* Get users */
        $users = User::latest()->get();

        /* Redirect to users view */
        return view('users.index', [
            'users' => $users
        ]);
    }
    public function store(Request $request)
    {
        /* Make a user with this data */
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        /* Back to before */
        return back();
    }
    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }
}
