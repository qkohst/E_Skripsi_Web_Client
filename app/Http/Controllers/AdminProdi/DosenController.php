<?php

namespace App\Http\Controllers\AdminProdi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class DosenController extends Controller
{
    public function __construct()
    {
        $this->_url = 'http://127.0.0.1:8000/api/v1/adminprodi/';
        $this->_api_key = 'VaKpEbkhOzZitGfIr1RxtGJkCwW43g7fiAnXhDkmyjUY5ezVFm4XdcbPwDBZ';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response_fungsional = Http::get($this->_url . 'jabatanfungsional', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);

        $response_struktural = Http::get($this->_url . 'jabatanstruktural', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);

        $response_dosen = Http::get($this->_url . 'dosen', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);

        if ($response_dosen->status() == 200) {
            $data_jabatan_fungsional = $response_fungsional->json()['data'];
            $data_jabatan_struktural = $response_struktural->json()['data'];
            $data_dosen = $response_dosen->json()['data'];

            return view('adminprodi.dosen.index', compact('data_dosen', 'data_jabatan_fungsional', 'data_jabatan_struktural'));
        }
        return back()->with('toast_error', $response_dosen->json()['message']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = Http::post($this->_url . 'dosen', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            'nama_dosen' => $request->nama_dosen,
            'nik_dosen' => $request->nik_dosen,
            'nidn_dosen' => $request->nidn_dosen,
            'nip_dosen' => $request->nip_dosen,
            'tempat_lahir_dosen' => $request->tempat_lahir_dosen,
            'tanggal_lahir_dosen' => $request->tanggal_lahir_dosen,
            'jenis_kelamin_dosen' => $request->jenis_kelamin_dosen,
            'agama_dosen' => $request->agama_dosen,
            'gelar_dosen' => $request->gelar_dosen,
            'pendidikan_terakhir_dosen' => $request->pendidikan_terakhir_dosen,
            'jabatan_fungsional_id_jabatan_fungsional' => $request->jabatan_fungsional_id_jabatan_fungsional,
            'jabatan_struktural_id_jabatan_struktural' => $request->jabatan_struktural_id_jabatan_struktural,
        ]);
        if ($response->status() == 201) {
            return back()->with('success', $response->json()['message']);
        }
        return back()->with('toast_error', $response->json()['message']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response_fungsional = Http::get($this->_url . 'jabatanfungsional', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);

        $response_struktural = Http::get($this->_url . 'jabatanstruktural', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);

        $response_dosen = Http::get($this->_url . 'dosen/' . $id, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);
        if ($response_dosen->status() == 200) {
            $data_jabatan_fungsional = $response_fungsional->json()['data'];
            $data_jabatan_struktural = $response_struktural->json()['data'];
            $data_dosen = $response_dosen->json()['data'];

            return view('adminprodi.dosen.show', compact('data_dosen', 'data_jabatan_fungsional', 'data_jabatan_struktural'));
        }
        return back()->with('toast_error', $response_dosen->json()['message']);
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
        $response = Http::post($this->_url . 'dosen/' . $id, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            '_method'   => 'PATCH',
            'nama_dosen' => $request->nama_dosen,
            'tempat_lahir_dosen' => $request->tempat_lahir_dosen,
            'tanggal_lahir_dosen' => $request->tanggal_lahir_dosen,
            'nip_dosen' => $request->nip_dosen,
            'nik_dosen' => $request->nik_dosen,
            'jabatan_fungsional_id_jabatan_fungsional' => $request->jabatan_fungsional_id_jabatan_fungsional,
            'jabatan_struktural_id_jabatan_struktural' => $request->jabatan_struktural_id_jabatan_struktural,
            'gelar_dosen' => $request->gelar_dosen,
            'pendidikan_terakhir_dosen' => $request->pendidikan_terakhir_dosen,
            'status_dosen' => $request->status_dosen,
        ]);
        if ($response->status() == 200) {
            return redirect('/dosen')->with('success', $response->json()['message']);
        }
        return back()->with('toast_error', $response->json()['message']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::post($this->_url . 'dosen/' . $id, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            '_method'   => 'DELETE',
        ]);
        if ($response->status() == 200) {
            return back()->with('success', $response->json()['message']);
        }
        return back()->with('toast_error', $response->json()['message']);
    }

    public function riset_password(Request $request, $id)
    {
        $response = Http::post($this->_url . 'dosen/' . $id . '/resetpassword', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            '_method'   => 'PATCH',
            'nidn_dosen' => $request->nidn_dosen,
        ]);
        if ($response->status() == 205) {
            return redirect('/dosen')->with('success', $response->json()['message']);
        }
        return back()->with('toast_error', $response->json()['message']);
    }
}
