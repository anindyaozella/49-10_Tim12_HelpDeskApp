<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return Auth::check() ? redirect()->route('dashboard') : view('login');
    }
    public function login(Request $request) {
        $data = $request->validate(['email'=>'required|email','password'=>'required']);
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        return back()->with('error','Email atau password salah.');
    }
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
