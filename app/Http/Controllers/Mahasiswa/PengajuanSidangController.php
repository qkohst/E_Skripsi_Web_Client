<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PDF;


class PengajuanSidangController extends Controller
{
    public function __construct()
    {
        $this->_url = 'http://127.0.0.1:8000/api/v1/mahasiswa/';
        $this->_api_key = 'VaKpEbkhOzZitGfIr1RxtGJkCwW43g7fiAnXhDkmyjUY5ezVFm4XdcbPwDBZ';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response_hasil_sidang = Http::get($this->_url . 'hasilsidangskripsi', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);

        if ($response_hasil_sidang->status() == 200) {
            $data_hasil_sidang = $response_hasil_sidang->json()['data'];
            return view('mahasiswa.sidangskripsi.hasilsidang', compact('data_hasil_sidang'));
        }

        $response_persetujuandosbing = Http::get($this->_url . 'sidangskripsi/persetujuandosbing', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);

        if ($response_persetujuandosbing->status() == 200) {
            $response_waktu = Http::get($this->_url . 'sidangskripsi/waktu', [
                'api_key' => $this->_api_key,
                'api_token' => session('api_token_user'),
            ]);
            if ($response_waktu->status() == 200) {
                $data_persetujuan_dosbing = $response_persetujuandosbing->json()['data'];
                $data_waktu = $response_waktu->json()['data'];
                return view('mahasiswa.sidangskripsi.waktu', compact('data_waktu', 'data_persetujuan_dosbing'));
            }

            $data_persetujuan_dosbing = $response_persetujuandosbing->json()['data'];
            return view('mahasiswa.sidangskripsi.persetujuandosbing', compact('data_persetujuan_dosbing'));
        }
        return view('mahasiswa.sidangskripsi.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file_sidang_skripsi               = request('file_sidang_skripsi');
        $file_sidang_skripsi_path          = $file_sidang_skripsi->getPathname();
        $file_sidang_skripsi_uploaded_name = $file_sidang_skripsi->getClientOriginalName();

        $file = fopen($file_sidang_skripsi_path, 'r');

        $response = Http::attach(
            'file_sidang_skripsi',
            $file,
            $file_sidang_skripsi_uploaded_name
        )->post($this->_url . 'sidangskripsi', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);

        if ($response->status() == 201 || $response->status() == 200) {
            return redirect('/pengajuansidang')->with('success', $response->json()['message']);
        }
        return back()->with('toast_error', $response->json()['message']);
    }


    public function cetaknilai()
    {
        $response = Http::get($this->_url . 'hasilsidangskripsi/daftarnilai', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);
        if ($response->status() == 200) {
            $hasil_sidang = $response->json()['data'];

            $pdf = PDF::loadview(
                'mahasiswa.sidangskripsi.cetaknilai',
                compact('hasil_sidang')
            )->setPaper('Folio', 'potrait');
            return $pdf->stream();
        }
        return back()->with('toast_error', $response->json()['message']);
    }
}
