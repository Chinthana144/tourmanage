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
            $filename = 'P_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/profiles'), $filename);
            $user->profile_picture = 'images/profiles/' . $filename;
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }//add user

    public function update(Request $request) {

        $user_id = $request->input('hidden_user_id');
        $user = User::find($user_id);

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->phone1 = $request->input('phone1');
        $user->phone2 = $request->input('phone2');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role_id = $request->input('cmb_edit_roles');

        //update profile picture if exists
        if ($request->hasFile('profile_edit_image')) {
            $file = $request->file('profile_edit_image');
            $filename = 'P_' . time() . '.' . $file->getClientOriginalExtension();

            // Delete the old profile picture if it exists
            if ($user->profile_picture) {
                $oldImagePath = public_path($user->profile_picture);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);  // Delete the old image file
                }
            }

            $file->move(public_path('images/profiles'), $filename);
            $user->profile_picture = 'images/profiles/' . $filename;
        }//has profile picture

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }//update user

    public function removeUser(Request $request){
        $user_id = $request->input('hidden_user_id');
        $user = User::find($user_id);
        $user->status == 1 ? $user->status = 0 : $user->status = 1;
        $user->save();
        return redirect()->route('users.index')->with('success', 'User removed successfully.');
    }

    public function getOneUser(Request $request){
        $user_id = $request->input('user_id');
        $user = User::find($user_id);
        return response()->json($user);
    }
}//class
