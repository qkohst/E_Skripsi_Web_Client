<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class AuthController extends Controller
{
    public function form_login()
    {
        return view('auth.login');
    }


    public function post_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|numeric|min:10',
            'password' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $response = Http::post('http://127.0.0.1:8000/api/v1/auth/login', [
            'api_key' => 'VaKpEbkhOzZitGfIr1RxtGJkCwW43g7fiAnXhDkmyjUY5ezVFm4XdcbPwDBZ',
            'username' => $request->username,
            'password' => $request->password,
        ]);

        // dd($response->json());
        if ($response->status() == 200) {
            $body = $response->json();
            $user = $body['user'];
            return view('dashboard.index', compact('user'))->with('success', 'Task Created Successfully!');
        } elseif ($response->status() == 400) {
            return back();
        } elseif ($response->status() == 401) {
            return back();
        } elseif ($response->status() == 422) {
            return back();
        }
    }
}
