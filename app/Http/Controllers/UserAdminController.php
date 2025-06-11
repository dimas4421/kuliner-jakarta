<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserAdminController extends Controller
{
    public function index()
    {
        $users = User::all(); // Mengambil semua data user dari database
        return view('admin.user', compact('users'));
    }
    public function edit($id)
{
    $user = User::findOrFail($id);
    return view('admin.Edit', compact('user'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'role' => 'required|string'
    ]);

    $user = User::findOrFail($id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->role = $request->role;
    $user->save();

    return redirect()->route('admin.user')->with('success', 'User berhasil diupdate.');
}

public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('admin.user')->with('success', 'User berhasil dihapus.');
}

public function create()
{
    return view('admin.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'role' => 'required|string',
    ]);


    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => $request->role
    ]);

    return redirect()->route('admin.user')->with('success', 'Akun berhasil ditambahkan.');
}


}
