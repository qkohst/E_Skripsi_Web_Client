<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class PersyaratanSkripsiController extends Controller
{
    public function __construct()
    {
        $this->_url = 'http://103.179.57.109/api/v1/mahasiswa/persyaratan/';
        $this->_api_key = 'VaKpEbkhOzZitGfIr1RxtGJkCwW43g7fiAnXhDkmyjUY5ezVFm4XdcbPwDBZ';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response_pembimbig2 = Http::get($this->_url . 'juduldosbing2', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);
        $response_dosen_aktif = Http::get('http://103.179.57.109/api/v1/mahasiswa/dosen', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);

        $dosen_aktif = $response_dosen_aktif->json()['data'];

        if ($response_pembimbig2->status() != 200) {
            $response_uploadkrs = Http::get($this->_url . 'uploadkrs', [
                'api_key' => $this->_api_key,
                'api_token' => session('api_token_user'),
            ]);

            if ($response_uploadkrs->status() == 200) {
                $response_pembimbig1 = Http::get($this->_url . 'juduldosbing1', [
                    'api_key' => $this->_api_key,
                    'api_token' => session('api_token_user'),
                ]);
                $status_krs = $response_uploadkrs->json()['data'];

                if ($response_pembimbig1->status() == 200) {
                    $persetujuan_pembimbing1 = $response_pembimbig1->json()['data'];
                    return view('mahasiswa.persyaratanskripsi.persetujuanpembimbing1', compact('status_krs', 'dosen_aktif', 'persetujuan_pembimbing1'));
                }

                return view('mahasiswa.persyaratanskripsi.statuskrs', compact('status_krs', 'dosen_aktif'));
            }
            return view('mahasiswa.persyaratanskripsi.index');
        }

        $response_pembimbig1 = Http::get($this->_url . 'juduldosbing1', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);

        $persetujuan_pembimbing1 = $response_pembimbig1->json()['data'];
        $persetujuan_pembimbing2 = $response_pembimbig2->json()['data'];
        return view('mahasiswa.persyaratanskripsi.persetujuanpembimbing2', compact('persetujuan_pembimbing1', 'persetujuan_pembimbing2', 'dosen_aktif'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file_krs               = request('file_krs');
        $file_krs_path          = $file_krs->getPathname();
        $file_krs_uploaded_name = $file_krs->getClientOriginalName();

        $file = fopen($file_krs_path, 'r');

        $response = Http::attach(
            'file_krs',
            $file,
            $file_krs_uploaded_name
        )->post($this->_url . 'uploadkrs', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);

        if ($response->status() == 200) {
            return redirect('/persyaratanskripsi')->with('success', $response->json()['message']);
        }
        return back()->with('toast_error', $response->json()['message']);
    }

    public function juduldosbing1(Request $request)
    {
        $response = Http::post($this->_url . 'juduldosbing1', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            'nama_judul_skripsi' => $request->nama_judul_skripsi,
            'dosen_id_dosen' => $request->dosen_id_dosen,
        ]);
        if ($response->status() == 200) {
            return redirect('/persyaratanskripsi')->with('success', $response->json()['message']);
        }
        return back()->with('toast_error', $response->json()['message']);
    }

    public function juduldosbing2(Request $request)
    {
        $response = Http::post($this->_url . 'juduldosbing2', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            'dosen_id_dosen' => $request->dosen_id_dosen,
        ]);
        if ($response->status() == 200) {
            return redirect('/persyaratanskripsi')->with('success', $response->json()['message']);
        }
        return back()->with('toast_error', $response->json()['message']);
    }
}
