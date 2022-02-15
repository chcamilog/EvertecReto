<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::paginate(5);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        User::create($request->only('name', 'username', 'email') + 
        [
            'password' => bcrypt($request->input('password')),
        ]);
        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function show(User $user)
    {
        // $user=User::findOrFail($id);
        // dd($user);
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->only('name', 'username', 'email');
        $password = $request->input('password');

        if($password)
            $data['password'] = bcrypt($password);
        
        $user->update($data);
        return redirect()->route('users.index')->with('success', 'Successful data update');
    }
}