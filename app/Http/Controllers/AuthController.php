<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->_url = 'http://127.0.0.1:8000/api/v1/';
        $this->_api_key = 'VaKpEbkhOzZitGfIr1RxtGJkCwW43g7fiAnXhDkmyjUY5ezVFm4XdcbPwDBZ';
    }

    public function index()
    {
        if (!session('status_login')) {
            return view('auth.login');
        }
        return redirect('/dashboard');
    }


    public function login(Request $request)
    {
        $response = Http::post($this->_url . 'auth/login', [
            'api_key' => $this->_api_key,
            'username' => $request->username,
            'password' => $request->password,
        ]);

        if ($response->status() == 200) {
            session([
                'status_login' => true,
                'id_user' => $response->json()['data']['id'],
                'nama_user' => $response->json()['data']['nama'],
                'username_user' => $response->json()['data']['username'],
                'role_user' => $response->json()['data']['role'],
                'api_token_user' => $response->json()['data']['api_token'],
            ]);
            return redirect('/dashboard')->with('success', $response->json()['message']);
        }
        return back()->with('toast_error', $response->json()['message']);
    }

    public function logout(Request $request)
    {
        $response = Http::post($this->_url . 'auth/logout', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);
        if ($response->status() == 200) {
            $request->session()->flush();
            return redirect('/')->with('success', $response->json()['message']);
        }
        return back()->with('toast_error', $response->json()['message']);
    }

    public function ganti_password(Request $request)
    {
        $response = Http::post($this->_url . 'auth/gantipassword', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            'username' => $request->username,
            'password_lama' => $request->password_lama,
            'password_baru' => $request->password_baru,
            'confirm_password' => $request->confirm_password,
        ]);
        if ($response->status() == 200) {
            $request->session()->flush();
            return redirect('/')->with('success', $response->json()['message']);
        }
        return back()->with('toast_error', $response->json()['message']);
    }
}
