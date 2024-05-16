<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\TelegramController;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function ViewLogin()
    {
        return view('auth.login');
    }

    public function PostLogin(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $url = '';

        if($request->user()->role == 'admin'){
            $url = 'backend/admin-dashboard';
        }elseif($request->user()->role == 'user'){
            $url = 'backend/user-dashboard';
        }
        return redirect()->intended($url)->with('success', 'login berhasil');
    }

    public function PostLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function ViewDaftar()
    {
        return view('auth._register');
    }

    public function PostRegister(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'no_hp' => ['required', 'numeric'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'no_hp' => $request->no_hp,
        ]);
        $telegramController = new TelegramController();
        $message = "Pengguna baru telah mendaftar.\nUsername: {$user->name}\nEmail: {$user->email}\nNo HP: {$user->no_hp}";
        $telegramController->sendTelegramMessage($message);

        $notification = array(
            'message' => 'Registrasi Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('user.dashboard')->with($notification);
    }
}
