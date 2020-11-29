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

        /* Validate data */
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8']
        ]);

        /* Make a user with this data */
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
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
