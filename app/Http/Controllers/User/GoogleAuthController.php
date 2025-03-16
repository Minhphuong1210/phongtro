<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class GoogleAuthController extends Controller
{
    private $clientId;
    private $clientSecret;
    private $redirectUri;

    public function __construct() {
        $this->clientId = config('services.google.client_id');
        $this->clientSecret = config('services.google.client_secret');
        $this->redirectUri = config('services.google.redirect');
    }

    public function getClientId() {
        return $this->clientId;
    }

    public function getClientSecret() {
        return $this->clientSecret;
    }

    public function getRedirectUri() {
        return $this->redirectUri;
    }

    public function redirectToGoogle()
    {
        // dd($this->clientSecret);
        $googleUrl = "https://accounts.google.com/o/oauth2/auth?" . http_build_query([
            'client_id'     => $this->clientId,
            'redirect_uri'  => $this->redirectUri,
            'response_type' => 'code',
            'scope'         => 'email profile',
            'access_type'   => 'offline',
            'prompt'        => 'consent',
        ]);

     
        return redirect($googleUrl);
    }

    public function handleGoogleCallback(Request $request)
    {
        $code = $request->query('code');
        if (!$code) {
            return redirect('/login')->with('error', 'Google login failed.');
        }

      
        // Lấy access token từ Google
        $response = Http::asForm()->post('https://oauth2.googleapis.com/token', [
            'client_id'     => $this->clientId,
            'client_secret' => $this->clientSecret,
            'redirect_uri'  => $this->redirectUri,
            'grant_type'    => 'authorization_code',
            'code'          => $code,
        ]);

    
        $data = $response->json();
        if (!isset($data['access_token'])) {
            return redirect('/login')->with('error', 'Google authentication failed.');
        }

        // Lấy thông tin người dùng từ Google
        $userResponse = Http::withToken($data['access_token'])->get('https://www.googleapis.com/oauth2/v2/userinfo');
        $googleUser = $userResponse->json();

        // Kiểm tra và lưu user vào database
        $user = User::updateOrCreate(
            ['email' => $googleUser['email']],
            [
                'name'     => $googleUser['name'],
                'password' => bcrypt(uniqid()),
                'google_id' => $googleUser['id'],
            ]
        );

        // Đăng nhập user
        auth()->login($user);

        return redirect('/')->with('success', 'Đăng nhập thành công!');
    }
}
