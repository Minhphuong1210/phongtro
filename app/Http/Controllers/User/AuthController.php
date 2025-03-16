<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\EditRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login()
    {

        return view('Frontend.Auth.Login');

    }
    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('home')->with('success', 'Đăng nhập thành công!');
        }

        return back()->with('error', 'Sai mật khẩu. Vui lòng thử lại.');
    }

    public function register()
    {
        return view('Frontend.Auth.Register');
    }
    public function postRegister(RegisterRequest $request)
    {
        // dd($request->all());
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);

        // Tự động đăng nhập sau khi đăng ký
        auth()->login($user);
        return redirect()->route('home');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Bạn đã đăng xuất.');
    }


    public function editUser(EditRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        if ($user) {
            return redirect()->route('user.thongTinCaNhan')->with('success', 'Đổi mật khẩu thành công!');
        } else {
            return redirect()->route('user.thongTinCaNhan')->with('error', 'đổi mật khẩu không thành công!');
        }

        // dd($request->all());

    }

}