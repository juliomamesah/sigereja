<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;


class TambahUserController extends Controller
{
    public function index()
    {
        if (auth()->guest() || auth()->user()->role !== 'admin') {
            abort(403);
        }
        return view('tambahuser', [
            'title' => 'Tambah User',
        ]);
    }

    public function getUsers()
    {
        if (auth()->guest() || auth()->user()->role !== 'admin') {
            abort(403);
        }

        return view('listusers', [
            'title' => 'Tambah User',
            'users' => User::paginate(5),
            "count" => User::all()->count(),
            "query" => ''
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|min:5',
            'role' => 'required'
        ]);

        // return dd($request);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/users');
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/users')->with('success', 'User berhasil dihapus');
    }
}
