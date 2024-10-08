<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

use function GuzzleHttp\Promise\all;

class RegisterController extends Controller
{
    public function index() {
        return view('register.index', [
            'title' => 'Registrasi',
            'active' => 'registrasi'
        ]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
                    'name' => 'required|max:255',
                    'username' => ['required', 'min:3', 'max:20', 'unique:users'],
                    'email' => 'required|email:dns|unique:users',
                    'password' => 'required|min:5|max:20'
         ]);

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        return redirect('/login')->with('success', 'Registrasi berhasil mohon segera login');
    }
}