<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Cek role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form');
    }

    /* ----------------------------------------------------------------------
     | TAMBAHAN: FITUR REGISTER USER BARU
     |----------------------------------------------------------------------
     */
    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed', // pastikan ada "password_confirmation"
        ]);
    
        // Simpan user baru ke database
        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // penting: di-hash pakai bcrypt
            'role' => 'user', // default role user biasa
        ]);
    
        // Login otomatis setelah register
        \Illuminate\Support\Facades\Auth::login($user);
    
        // Redirect ke dashboard user
        return redirect()->route('user.dashboard')->with('success', 'Pendaftaran akun berhasil!');
    }    
}