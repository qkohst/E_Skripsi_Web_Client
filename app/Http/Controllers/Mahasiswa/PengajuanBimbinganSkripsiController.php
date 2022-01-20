<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PDF;

class PengajuanBimbinganSkripsiController extends Controller
{
    public function __construct()
    {
        $this->_url = 'http://103.179.57.109/api/v1/mahasiswa/bimbinganskripsi';
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
            $response_pembimbing = Http::get('http://103.179.57.109/api/v1/mahasiswa/dosenpembimbing', [
                'api_key' => $this->_api_key,
                'api_token' => session('api_token_user'),
            ]);
            $dosen_pembimbing = $response_pembimbing->json()['data'];
            $bimbinganskripsi = $response->json()['data'];
            return view('mahasiswa.bimbinganskripsi.index', compact('bimbinganskripsi', 'dosen_pembimbing'));
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
        $nama_file_bimbingan_skripsi               = request('nama_file_bimbingan_skripsi');
        $nama_file_bimbingan_skripsi_path          = $nama_file_bimbingan_skripsi->getPathname();
        $nama_file_bimbingan_skripsi_uploaded_name = $nama_file_bimbingan_skripsi->getClientOriginalName();

        $file = fopen($nama_file_bimbingan_skripsi_path, 'r');

        $response = Http::attach(
            'nama_file_bimbingan_skripsi',
            $file,
            $nama_file_bimbingan_skripsi_uploaded_name
        )->post($this->_url, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            'topik_bimbingan_skripsi' => $request->topik_bimbingan_skripsi,
            'dosen_pembimbing_id_dosen_pembimbing' => $request->dosen_pembimbing_id_dosen_pembimbing,
        ]);
        if ($response->status() == 201) {
            return back()->with('success', $response->json()['message']);
        }
        return back()->with('toast_error', $response->json()['message']);
    }


    public function beritaacara()
    {
        $response = Http::get($this->_url . '/beritaacara', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);
        if ($response->status() == 200) {
            $data_mahasiswa = $response->json()['data']['mahasiswa'];
            $data_judul_skripsi = $response->json()['data']['judul_skripsi'];
            $data_program_studi = $response->json()['data']['program_studi'];

            $data_dosen_pembimbing_1 = $response->json()['data']['data_bimbingan_skripsi']['dosen_pembimbing_1']['dosen'];
            $data_dosen_pembimbing_2 = $response->json()['data']['data_bimbingan_skripsi']['dosen_pembimbing_2']['dosen'];
            $data_bimbingan_1 = $response->json()['data']['data_bimbingan_skripsi']['dosen_pembimbing_1']['data_bimbingan'];
            $data_bimbingan_2 = $response->json()['data']['data_bimbingan_skripsi']['dosen_pembimbing_2']['data_bimbingan'];

            $pdf = PDF::loadview(
                'mahasiswa.bimbinganskripsi.beritaacara',
                compact('data_mahasiswa', 'data_judul_skripsi', 'data_program_studi', 'data_dosen_pembimbing_1', 'data_dosen_pembimbing_2', 'data_bimbingan_1', 'data_bimbingan_2')
            )->setPaper('Folio', 'potrait');
            return $pdf->stream();
        }
        return back()->with('toast_error', $response->json()['message']);
    }
}
