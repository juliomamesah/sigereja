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
        if(auth()->guest() || auth()->user()->role !== 'admin'){
            abort(403);
        }
        return view('tambahuser', [
            'title' => 'Tambah User',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|min:5',
            'role' => 'required'
        ]);
        
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);

        return redirect('/beranda');
    }
}
