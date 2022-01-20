<?php

namespace App\Http\Controllers\AdminProdi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PDF;


class SidangSkripsiController extends Controller
{
    public function __construct()
    {
        $this->_url = 'http://103.179.57.109/api/v1/adminprodi/';
        $this->_api_key = 'VaKpEbkhOzZitGfIr1RxtGJkCwW43g7fiAnXhDkmyjUY5ezVFm4XdcbPwDBZ';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get($this->_url . 'sidangskripsi', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);

        if ($response->status() == 200) {
            $data_sidang = $response->json()['data'];
            return view('adminprodi.sidangskripsi.index', compact('data_sidang'));
        }
        return back()->with('toast_error', $response->json()['message']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = Http::get($this->_url . 'sidangskripsi/' . $id, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);
        if ($response->status() == 200) {
            $data_sidang = $response->json()['data'];
            return view('adminprodi.sidangskripsi.edit', compact('data_sidang'));
        }
        return back()->with('toast_error', $response->json()['message']);
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
        $response = Http::post($this->_url . 'sidangskripsi/' . $id, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            '_method'   => 'PATCH',
            'waktu_sidang_skripsi' => $request->waktu_sidang_skripsi,
            'tempat_sidang_skripsi' => $request->tempat_sidang_skripsi,
        ]);
        if ($response->status() == 200) {
            return redirect('/sidangskripsi')->with('success', $response->json()['message']);
        }
        return back()->with('toast_error', $response->json()['message']);
    }

    public function hasil_sidang($id)
    {
        $response_hasil = Http::get($this->_url . 'sidangskripsi/' . $id . '/hasil', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);
        if ($response_hasil->status() == 200) {
            $response_sidang = Http::get($this->_url . 'sidangskripsi/' . $id, [
                'api_key' => $this->_api_key,
                'api_token' => session('api_token_user'),
            ]);
            $data_sidang = $response_sidang->json()['data'];
            $data_hasil = $response_hasil->json()['data'];
            return view('adminprodi.sidangskripsi.hasilsidang', compact('data_sidang', 'data_hasil'));
        }
        return back()->with('toast_error', $response_hasil->json()['message']);
    }

    public function verifikasi_selesai($id)
    {
        $response = Http::post($this->_url . 'sidangskripsi/' . $id . '/verifikasi', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            '_method'   => 'PATCH',
        ]);
        if ($response->status() == 200) {
            return back()->with('success', $response->json()['message']);
        }
        return back()->with('toast_error', $response->json()['message']);
    }

    public function cetak_nilai($id)
    {
        $response = Http::get($this->_url . 'sidangskripsi/' . $id . '/daftarnilai', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);
        if ($response->status() == 200) {
            $data_nilai = $response->json()['data'];
            $pdf = PDF::loadview('adminprodi.sidangskripsi.cetaknilaisidang', compact('data_nilai'))->setPaper('Folio', 'potrait');
            return $pdf->stream();
        }
        return back()->with('toast_error', $response->json()['message']);
    }
}
