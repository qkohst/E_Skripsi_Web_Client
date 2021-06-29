<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->_url = 'http://127.0.0.1:8000/api/v1/dosen/profile';
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
            return view('dosen.profile.index', compact('profile'));
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
        if ($request->hasFile('foto_dosen')) {
            $foto_dosen               = request('foto_dosen');
            $foto_dosen_path          = $foto_dosen->getPathname();
            $foto_dosen_uploaded_name = $foto_dosen->getClientOriginalName();

            $file = fopen($foto_dosen_path, 'r');

            $response = Http::attach(
                'foto_dosen',
                $file,
                $foto_dosen_uploaded_name
            )->post($this->_url, [
                'api_key' => $this->_api_key,
                'api_token' => session('api_token_user'),
                'status_perkawinan_dosen' => $request->status_perkawinan_dosen,
                'jenis_kelamin_dosen' => $request->jenis_kelamin_dosen,
                'nama_ibu_dosen' => $request->nama_ibu_dosen,
                'alamat_dosen' => $request->alamat_dosen,
                'provinsi_dosen' => $request->provinsi_dosen,
                'kabupaten_dosen' => $request->kabupaten_dosen,
                'kecamatan_dosen' => $request->kecamatan_dosen,
                'desa_dosen' => $request->desa_dosen,
                'no_hp_dosen' => $request->no_hp_dosen,
                'email_dosen' => $request->email_dosen,
            ]);

            if ($response->status() == 200) {
                return redirect('/dashboard')->with('success', $response->json()['message']);
            }
            return back()->with('toast_error', $response->json()['message']);
        }
        $response = Http::post($this->_url, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            'status_perkawinan_dosen' => $request->status_perkawinan_dosen,
            'jenis_kelamin_dosen' => $request->jenis_kelamin_dosen,
            'nama_ibu_dosen' => $request->nama_ibu_dosen,
            'alamat_dosen' => $request->alamat_dosen,
            'provinsi_dosen' => $request->provinsi_dosen,
            'kabupaten_dosen' => $request->kabupaten_dosen,
            'kecamatan_dosen' => $request->kecamatan_dosen,
            'desa_dosen' => $request->desa_dosen,
            'no_hp_dosen' => $request->no_hp_dosen,
            'email_dosen' => $request->email_dosen,
        ]);
        if ($response->status() == 200) {
            return redirect('/dashboard')->with('success', $response->json()['message']);
        }
        return back()->with('toast_error', $response->json()['message']);
    }
}
