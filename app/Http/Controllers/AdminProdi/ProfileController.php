<?php

namespace App\Http\Controllers\AdminProdi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->_url = 'http://103.179.57.109/api/v1/adminprodi/profile';
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
            return view('adminprodi.profile.index', compact('profile'));
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
        if ($request->hasFile('foto_admin_prodi')) {
            $foto_admin_prodi               = request('foto_admin_prodi');
            $foto_admin_prodi_path          = $foto_admin_prodi->getPathname();
            $foto_admin_prodi_uploaded_name = $foto_admin_prodi->getClientOriginalName();

            $file = fopen($foto_admin_prodi_path, 'r');

            $response = Http::attach(
                'foto_admin_prodi',
                $file,
                $foto_admin_prodi_uploaded_name
            )->post($this->_url, [
                'api_key' => $this->_api_key,
                'api_token' => session('api_token_user'),
                'tempat_lahir_admin_prodi' => $request->tempat_lahir_admin_prodi,
                'tanggal_lahir_admin_prodi' => $request->tanggal_lahir_admin_prodi,
                'jenis_kelamin_admin_prodi' => $request->jenis_kelamin_admin_prodi,
                'email_admin_prodi' => $request->email_admin_prodi,
                'no_hp_admin_prodi' => $request->no_hp_admin_prodi,
            ]);

            if ($response->status() == 200) {
                return redirect('/dashboard')->with('success', $response->json()['message']);
            }
            return back()->with('toast_error', $response->json()['message']);
        }
        $response = Http::post($this->_url, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            'tempat_lahir_admin_prodi' => $request->tempat_lahir_admin_prodi,
            'tanggal_lahir_admin_prodi' => $request->tanggal_lahir_admin_prodi,
            'jenis_kelamin_admin_prodi' => $request->jenis_kelamin_admin_prodi,
            'email_admin_prodi' => $request->email_admin_prodi,
            'no_hp_admin_prodi' => $request->no_hp_admin_prodi,
        ]);
        if ($response->status() == 200) {
            return redirect('/dashboard')->with('success', $response->json()['message']);
        }
        return back()->with('toast_error', $response->json()['message']);
    }
}
