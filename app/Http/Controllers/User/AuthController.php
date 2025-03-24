<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\EditRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Mail\ForgotpasswordMail;
use App\Models\User;
use \App\Models\password_resets;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use Str;


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


    public function forgot_password()
    {   
        return view('Frontend.Auth.forgot-password');
    }

     public function forgot_password_email(Request $request)
    {

        $user = User::where('email', $request->email)->first();

//        dd($user);

        if (!$user) {
            return response()->json([
                'error' => 'Không tìm thấy email người dùng',
            ]);
        }
        $token = Str::random(40);
        $tokenData = [
            'email' => $request->email,
            'token' => $token
        ];

        if (password_resets::create($tokenData)) {

            Mail::to($request->email)->send(new ForgotpasswordMail($user, $token));

            return response()->json([
                'message' => 'Đã kiểm tra thành công vui lòng kiểm tra email'
            ]);
        }
        return response()->json([
            'error' => 'Vui lòng kiểm tra lại email'
        ]);

    }

    public function reset_password($token)
    {

        // cái này có thể viết bên model
        $tokenData = \App\Models\password_resets::CheckToken($token);
        // thời gian tạo token
        $timestamp = $tokenData->created_at->timestamp;
        $timeout = strtotime('+10 minutes', $timestamp);
        $timescurrent = time(); // đây là thời gian hiện tại
        if ($timeout < $timescurrent) {
            $thoiGianHetHan = password_resets::where('token', $token)->delete();
            return view('Frontend.Auth.reset_password')->with('error', 'Token không hợp lệ hoặc đã hết hạn.');
        }

        return view('Frontend.Auth.reset_password', ['token' => $token]);

    }

    public function check_reset_password(Request $request, $token)
    {
        $tokenData = password_resets::CheckToken($token);

        $timestamp = $tokenData->created_at->timestamp;
        $timeout = strtotime('+10 minutes', $timestamp);
        $timescurrent = time(); // đây là thời gian hiện tại
        if ($timeout < $timescurrent) {
            $thoiGianHetHan = password_resets::where('token', $token)->delete();
            return view('Frontend.Auth.reset_password')->with('error', 'Token không hợp lệ hoặc đã hết hạn.');
        }
        if (!$tokenData) {
            return view('Frontend.Auth.reset_password')->with('error', 'Không tìm thấy');
        }
        $email = $tokenData->email;
        $user = User::where('email', $email)->first();


        if (!$user) {
            return view('Frontend.Auth.reset_password')->with('error', 'Không tìm thấy');
        }

        $data = [
            'password' => bcrypt($request->newPassword)
        ];
//       dd($data);
        $check = $user->update($data);
        if ($check) {
            password_resets::where('token', $token)->delete();

            return redirect()->route('login')->with('success', 'Mật khẩu đã được cập nhật thành công.');

        } else {
            return view('Frontend.Auth.reset_password')->with('error', 'Chưa cập nhật đươợc mất khẩu');
        }
    }


}