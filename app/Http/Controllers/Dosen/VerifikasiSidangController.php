<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VerifikasiSidangController extends Controller
{
    public function __construct()
    {
        $this->_url = 'http://127.0.0.1:8000/api/v1/dosen/sidangskripsi';
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
            $verifikasisidang = $response->json()['data'];
            return view('dosen.verifikasisidang.index', compact('verifikasisidang'));
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
        $response_sidang = Http::get($this->_url . '/' . $id, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);

        if ($response_sidang->status() == 200) {
            $data_sidang = $response_sidang->json()['data'];
            if ($data_sidang['status_verifikasi_hasil_sidang_skripsi'] == 'Lulus Sidang') {
                $response_nilai = Http::get($this->_url . '/' . $id . '/nilai', [
                    'api_key' => $this->_api_key,
                    'api_token' => session('api_token_user')
                ]);
                $data_nilai = $response_nilai->json()['data'];
                return view('dosen.verifikasisidang.inputnilai', compact('data_sidang', 'data_nilai'));
            } else {
                return view('dosen.verifikasisidang.show', compact('data_sidang'));
            }
        }
        return back()->with('toast_error', $response_sidang->json()['message']);
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
        $response = Http::post($this->_url . '/' . $id, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            '_method'   => 'PATCH',
            'status_verifikasi_hasil_sidang_skripsi' => $request->status_verifikasi_hasil_sidang_skripsi,
            'catatan_hasil_sidang_skripsi' => $request->catatan_hasil_sidang_skripsi,
        ]);

        if ($response->status() == 200) {
            if ($request->status_verifikasi_hasil_sidang_skripsi == 'Lulus Sidang') {
                $response_nilai = Http::get($this->_url . '/' . $id . '/nilai', [
                    'api_key' => $this->_api_key,
                    'api_token' => session('api_token_user')
                ]);
                $data_sidang = $response->json()['data'];
                $data_nilai = $response_nilai->json()['data'];
                return view('dosen.verifikasisidang.inputnilai', compact('data_sidang', 'data_nilai'));
            } elseif ($request->status_verifikasi_hasil_sidang_skripsi == 'Revisi') {
                return redirect('/verifikasisidang')->with('success', $response->json()['message']);
            }
        }
        return back()->with('toast_error', $response->json()['message']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function post_nilai(Request $request, $id)
    {
        $response = Http::post($this->_url . '/' . $id . '/nilai', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            '_method'   => 'PATCH',
            'nilai_a1_hasil_sidang_skripsi' => $request->nilai_a1_hasil_sidang_skripsi,
            'nilai_a2_hasil_sidang_skripsi' => $request->nilai_a2_hasil_sidang_skripsi,
            'nilai_a3_hasil_sidang_skripsi' => $request->nilai_a3_hasil_sidang_skripsi,
            'nilai_b1_hasil_sidang_skripsi' => $request->nilai_b1_hasil_sidang_skripsi,
            'nilai_b2_hasil_sidang_skripsi' => $request->nilai_b2_hasil_sidang_skripsi,
            'nilai_b3_hasil_sidang_skripsi' => $request->nilai_b3_hasil_sidang_skripsi,
            'nilai_b4_hasil_sidang_skripsi' => $request->nilai_b4_hasil_sidang_skripsi,
            'nilai_b5_hasil_sidang_skripsi' => $request->nilai_b5_hasil_sidang_skripsi,
            'nilai_b6_hasil_sidang_skripsi' => $request->nilai_b6_hasil_sidang_skripsi,
            'nilai_b7_hasil_sidang_skripsi' => $request->nilai_b7_hasil_sidang_skripsi,
            'nilai_c1_hasil_sidang_skripsi' => $request->nilai_c1_hasil_sidang_skripsi,
            'nilai_c2_hasil_sidang_skripsi' => $request->nilai_c2_hasil_sidang_skripsi,
            'nilai_c3_hasil_sidang_skripsi' => $request->nilai_c3_hasil_sidang_skripsi,
        ]);

        if ($response->status() == 200) {
            return redirect('/verifikasisidang')->with('success', $response->json()['message']);
        }
        return back()->with('toast_error', $response->json()['message']);
    }
}
