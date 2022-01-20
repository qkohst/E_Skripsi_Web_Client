<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PDF;


class PengajuanSeminarController extends Controller
{
    public function __construct()
    {
        $this->_url = 'http://103.179.57.109/api/v1/mahasiswa/';
        $this->_api_key = 'VaKpEbkhOzZitGfIr1RxtGJkCwW43g7fiAnXhDkmyjUY5ezVFm4XdcbPwDBZ';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response_hasil_seminar = Http::get($this->_url . 'hasilseminarproposal', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);

        if ($response_hasil_seminar->status() == 200) {
            $data_hasil_seminar = $response_hasil_seminar->json()['data'];
            return view('mahasiswa.seminarproposal.hasilseminar', compact('data_hasil_seminar'));
        }

        $response_persetujuandosbing = Http::get($this->_url . 'seminarproposal/persetujuandosbing', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);

        if ($response_persetujuandosbing->status() == 200) {
            $response_penguji = Http::get($this->_url . 'seminarproposal/penguji', [
                'api_key' => $this->_api_key,
                'api_token' => session('api_token_user'),
            ]);
            if ($response_penguji->status() == 200) {
                $data_persetujuan_dosbing = $response_persetujuandosbing->json()['data'];
                $data_persetujuan_penguji = $response_penguji->json()['data'];
                return view('mahasiswa.seminarproposal.penguji', compact('data_persetujuan_penguji', 'data_persetujuan_dosbing'));
            }

            $data_persetujuan_dosbing = $response_persetujuandosbing->json()['data'];
            return view('mahasiswa.seminarproposal.persetujuandosbing', compact('data_persetujuan_dosbing'));
        }
        return view('mahasiswa.seminarproposal.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file_seminar_proposal               = request('file_seminar_proposal');
        $file_seminar_proposal_path          = $file_seminar_proposal->getPathname();
        $file_seminar_proposal_uploaded_name = $file_seminar_proposal->getClientOriginalName();

        $file = fopen($file_seminar_proposal_path, 'r');

        $response = Http::attach(
            'file_seminar_proposal',
            $file,
            $file_seminar_proposal_uploaded_name
        )->post($this->_url . 'seminarproposal', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);

        if ($response->status() == 201 || $response->status() == 200) {
            return redirect('/pengajuanseminar')->with('success', $response->json()['message']);
        }
        return back()->with('toast_error', $response->json()['message']);
    }

    public function cetaknilai()
    {
        $response = Http::get($this->_url . 'hasilseminarproposal/daftarnilai', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);
        if ($response->status() == 200) {
            $hasil_seminar = $response->json()['data'];

            $pdf = PDF::loadview(
                'mahasiswa.seminarproposal.cetaknilai',
                compact('hasil_seminar')
            )->setPaper('Folio', 'potrait');
            return $pdf->stream();
        }
        return back()->with('toast_error', $response->json()['message']);
    }
}
