<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;

class AuthenticatedSessionController extends Controller
{
    // Menampilkan form login
    public function create()
    {
        return view('auth.login'); // Menampilkan halaman login
    }

    // Menangani login
    public function store(LoginRequest $request): RedirectResponse
{
    // Cek kredensial login dengan username
    if (Auth::attempt(['username' => $request->username, 'password' => $request->password], $request->boolean('remember'))) {
        // Regenerate session setelah login
        $request->session()->regenerate();

        // Redirect berdasarkan role pengguna
        if (Auth::user()->role === 'admin') {
            return redirect()->route('products.index'); // Redirect ke halaman produk untuk admin
        }

        return redirect('/'); // Redirect ke halaman beranda untuk customer
    }

    // Jika login gagal
    return back()->withErrors([
        'username' => 'Username atau password salah.',
    ]);
}


    // Menangani logout
    public function destroy(Request $request)
    {
        Auth::logout(); // Proses logout

        // Menghancurkan session untuk keamanan
        $request->session()->invalidate();

        // Regenerasi session ID untuk menghindari session fixation
        $request->session()->regenerateToken();

        // Redirect ke halaman beranda setelah logout
        return redirect('/beranda');
    }
}
