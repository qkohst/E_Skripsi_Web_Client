<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->_url = 'http://127.0.0.1:8000/api/v1/';
        $this->_api_key = 'VaKpEbkhOzZitGfIr1RxtGJkCwW43g7fiAnXhDkmyjUY5ezVFm4XdcbPwDBZ';
    }

    public function index()
    {
        if (session('role_user') == 'Admin') {
            $response = Http::get($this->_url . 'admin/profile', [
                'api_key' => $this->_api_key,
                'api_token' => session('api_token_user'),
            ]);
            $avatar = $response->json()['data']['foto_admin'];
            session([
                'avatar_user' => $avatar['url']
            ]);
            return view('dashboard.admin');
        } elseif (session('role_user') == 'Admin Prodi') {
            return view('dashboard.adminprodi');
        } elseif (session('role_user') == 'Mahasiswa') {
            return view('dashboard.mahasiswa');
        } elseif (session('role_user') == 'Dosen') {
            return view('dashboard.dosen');
        }
        return back()->with('toast_error', 'User role not found');
    }
}
