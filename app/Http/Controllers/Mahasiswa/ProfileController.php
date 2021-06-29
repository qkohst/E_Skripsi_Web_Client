<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->_url = 'http://127.0.0.1:8000/api/v1/mahasiswa/profile';
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
            return view('mahasiswa.profile.index', compact('profile'));
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
