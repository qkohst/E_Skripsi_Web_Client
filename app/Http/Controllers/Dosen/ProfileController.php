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
            $response_provinsi = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
            $response_kabupaten = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kota', [
                'id_provinsi' => $profile['provinsi_dosen']['id'],
            ]);
            $response_kecamatan = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kecamatan', [
                'id_kota' => $profile['kabupaten_dosen']['id'],
            ]);
            $response_desa = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kelurahan', [
                'id_kecamatan' => $profile['kecamatan_dosen']['id'],
            ]);

            $data_provinsi = $response_provinsi->json()['provinsi'];
            $data_kabupaten = $response_kabupaten->json()['kota_kabupaten'];
            $data_kecamatan = $response_kecamatan->json()['kecamatan'];
            $data_desa = $response_desa->json()['kelurahan'];

            return view('dosen.profile.index', compact('profile', 'data_provinsi', 'data_kabupaten', 'data_kecamatan', 'data_desa'));
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
