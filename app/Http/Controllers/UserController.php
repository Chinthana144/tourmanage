<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {

        $roles = Roles::all();
        $users = User::paginate(10);

        return view('users.users_view', compact('users', 'roles'));
    }

    public function store(Request $request) {

        // $request->validate([
        //     'first_name' => 'required|string|max:255',
        //     'last_name' => 'required|string|max:255',
        //     'phone1' => 'required|string|max:20',
        //     'phone2' => 'nullable|string|max:20',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:8|confirmed',
        //     'role_id' => 'required|exists:roles,id',
        //     'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        // dd ($request->all());

        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->phone1 = $request->input('phone1');
        $user->phone2 = $request->input('phone2');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role_id = $request->input('cmb_roles');

        //store profile picture if exists
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            // dd($filename);
            $file->move(public_path('images/profiles'), $filename);
            $user->profile_picture = 'images/profiles/' . $filename;
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
}//class
