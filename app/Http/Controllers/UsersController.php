<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{

    public function index()
    {
        // $users = User::all();
        return view('users.index', [
            'users' => User::latest()->paginate(30)
        ]);
    }


    public function create()
    {
        
    }


    public function store(Request $request)
    {
        $new_user = new User;
        $new_user->name = $request->name;
        $new_user->email = $request->email;
        $new_user->Phone_Number = $request->phone_number;
        $new_user->password = $request->password;
        $new_user->save();

        return redirect()->route('user.show', ['user' => $new_user->id]);
    }


    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->Phone_Number = $request->phone_number;
        $user->password = $request->password;
        $user->save();

        return redirect()->route('user.show', ['user' => $user->id])
        ->with('success', 'User updated successfully!');

    }


    public function destroy(string $id)
    {
        //
    }
}
