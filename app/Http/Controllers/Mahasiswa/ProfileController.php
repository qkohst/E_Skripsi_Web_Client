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
        $response = Http::asForm()->post($this->_url, [
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
            'foto_mahasiswa' => $request->file('foto_mahasiswa'),
        ]);
        dd($response->json());
        // if ($response->status() == 200) {
        //     return back()->with('success', $response->json()['message']);
        // }
        // return back()->with('toast_error', $response->json()['message']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
