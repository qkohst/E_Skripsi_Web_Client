<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\UploadedFile;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->_url = 'http://127.0.0.1:8000/api/v1/admin/profile';
        $this->_api_key = 'VaKpEbkhOzZitGfIr1RxtGJkCwW43g7fiAnXhDkmyjUY5ezVFm4XdcbPwDBZ';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get($this->_url, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);
        if ($response->status() == 200) {
            $profile = $response->json()['data'];
            return view('admin.profile.index', compact('profile'));
        }
        return back()->with('toast_error', $response->json()['message']);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = Http::asForm()->post($this->_url, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            'nama_admin' => $request->nama_admin,
            'nidn_admin' => $request->nidn_admin,
            'nip_admin' => $request->nip_admin,
            'nik_admin' => $request->nik_admin,
            'tempat_lahir_admin' => $request->tempat_lahir_admin,
            'tanggal_lahir_admin' => $request->tanggal_lahir_admin,
            'jenis_kelamin_admin' => $request->jenis_kelamin_admin,
            'email_admin' => $request->email_admin,
            'no_hp_admin' => $request->no_hp_admin,
            'foto_admin' => $request->file('foto_admin'),
        ]);
        dd($response->json());
        // if ($response->status() == 200) {
        //     return back()->with('success', $response->json()['message']);
        // }
        // return back()->with('toast_error', $response->json()['message']);
    }
}
