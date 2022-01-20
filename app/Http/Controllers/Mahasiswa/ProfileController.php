<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->_url = 'http://103.179.57.109/api/v1/mahasiswa/profile';
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
                'id_provinsi' => $profile['provinsi_mahasiswa']['id'],
            ]);
            $response_kecamatan = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kecamatan', [
                'id_kota' => $profile['kabupaten_mahasiswa']['id'],
            ]);
            $response_desa = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kelurahan', [
                'id_kecamatan' => $profile['kecamatan_mahasiswa']['id'],
            ]);

            $data_provinsi = $response_provinsi->json()['provinsi'];
            $data_kabupaten = $response_kabupaten->json()['kota_kabupaten'];
            $data_kecamatan = $response_kecamatan->json()['kecamatan'];
            $data_desa = $response_desa->json()['kelurahan'];

            return view('mahasiswa.profile.index', compact('profile', 'data_provinsi', 'data_kabupaten', 'data_kecamatan', 'data_desa'));
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
        if ($request->hasFile('foto_mahasiswa')) {
            $foto_mahasiswa               = request('foto_mahasiswa');
            $foto_mahasiswa_path          = $foto_mahasiswa->getPathname();
            $foto_mahasiswa_uploaded_name = $foto_mahasiswa->getClientOriginalName();

            $file = fopen($foto_mahasiswa_path, 'r');

            $response = Http::attach(
                'foto_mahasiswa',
                $file,
                $foto_mahasiswa_uploaded_name
            )->post($this->_url, [
                'api_key' => $this->_api_key,
                'api_token' => session('api_token_user'),
                'status_perkawinan_mahasiswa' => $request->status_perkawinan_mahasiswa,
                'agama_mahasiswa' => $request->agama_mahasiswa,
                'jenis_kelamin_mahasiswa' => $request->jenis_kelamin_mahasiswa,
                'nama_ibu_mahasiswa' => $request->nama_ibu_mahasiswa,
                'alamat_mahasiswa' => $request->alamat_mahasiswa,
                'provinsi_mahasiswa' => $request->provinsi_mahasiswa,
                'kabupaten_mahasiswa' => $request->kabupaten_mahasiswa,
                'kecamatan_mahasiswa' => $request->kecamatan_mahasiswa,
                'desa_mahasiswa' => $request->desa_mahasiswa,
                'no_hp_mahasiswa' => $request->no_hp_mahasiswa,
                'email_mahasiswa' => $request->email_mahasiswa,
            ]);

            if ($response->status() == 200) {
                return redirect('/dashboard')->with('success', $response->json()['message']);
            }
            return back()->with('toast_error', $response->json()['message']);
        }
        $response = Http::post($this->_url, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            'status_perkawinan_mahasiswa' => $request->status_perkawinan_mahasiswa,
            'agama_mahasiswa' => $request->agama_mahasiswa,
            'jenis_kelamin_mahasiswa' => $request->jenis_kelamin_mahasiswa,
            'nama_ibu_mahasiswa' => $request->nama_ibu_mahasiswa,
            'alamat_mahasiswa' => $request->alamat_mahasiswa,
            'provinsi_mahasiswa' => $request->provinsi_mahasiswa,
            'kabupaten_mahasiswa' => $request->kabupaten_mahasiswa,
            'kecamatan_mahasiswa' => $request->kecamatan_mahasiswa,
            'desa_mahasiswa' => $request->desa_mahasiswa,
            'no_hp_mahasiswa' => $request->no_hp_mahasiswa,
            'email_mahasiswa' => $request->email_mahasiswa,
        ]);
        if ($response->status() == 200) {
            return redirect('/dashboard')->with('success', $response->json()['message']);
        }
        return back()->with('toast_error', $response->json()['message']);
    }
}
