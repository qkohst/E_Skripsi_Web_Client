<?php

namespace App\Http\Controllers\AdminProdi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PDF;


class SeminarProposalController extends Controller
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
        $response = Http::get($this->_url . 'seminarproposal', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);
        if ($response->status() == 200) {
            $data_seminar = $response->json()['data'];
            return view('adminprodi.seminarproposal.index', compact('data_seminar'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response_seminar = Http::get($this->_url . 'seminarproposal/' . $id . '/penguji', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);
        if ($response_seminar->status() == 200) {
            $data_seminar = $response_seminar->json()['data'];
            return view('adminprodi.seminarproposal.show', compact('data_seminar'));
        }
        return back()->with('toast_error', $response_seminar->json()['message']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response_seminar = Http::get($this->_url . 'seminarproposal/' . $id, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);
        if ($response_seminar->status() == 200) {
            $response_dosen = Http::get($this->_url . 'dosen/aktif', [
                'api_key' => $this->_api_key,
                'api_token' => session('api_token_user'),
            ]);
            $data_seminar = $response_seminar->json()['data'];
            $data_dosen = $response_dosen->json()['data'];
            return view('adminprodi.seminarproposal.edit', compact('data_seminar', 'data_dosen'));
        }
        return back()->with('toast_error', $response_seminar->json()['message']);
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
        $response = Http::post($this->_url . 'seminarproposal/' . $id, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            '_method'   => 'PATCH',
            'id_dosen_penguji1_seminar_proposal' => $request->id_dosen_penguji1_seminar_proposal,
            'id_dosen_penguji2_seminar_proposal' => $request->id_dosen_penguji2_seminar_proposal,
            'waktu_seminar_proposal' => $request->waktu_seminar_proposal,
            'tempat_seminar_proposal' => $request->tempat_seminar_proposal,
        ]);
        if ($response->status() == 200) {
            return redirect('/seminarproposal')->with('success', $response->json()['message']);
        }
        return back()->with('toast_error', $response->json()['message']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hasil_seminar($id)
    {
        $response_hasil = Http::get($this->_url . 'seminarproposal/' . $id . '/hasil', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);
        if ($response_hasil->status() == 200) {
            $response_seminar = Http::get($this->_url . 'seminarproposal/' . $id, [
                'api_key' => $this->_api_key,
                'api_token' => session('api_token_user'),
            ]);
            $data_seminar = $response_seminar->json()['data'];
            $data_hasil = $response_hasil->json()['data'];
            return view('adminprodi.seminarproposal.hasilseminar', compact('data_seminar', 'data_hasil'));
        }
        return back()->with('toast_error', $response_hasil->json()['message']);
    }

    public function verifikasi_selesai($id)
    {
        $response = Http::post($this->_url . 'seminarproposal/' . $id . '/verifikasi', [
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
        $response = Http::get($this->_url . 'seminarproposal/' . $id . '/daftarnilai', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);
        if ($response->status() == 200) {
            $data_nilai = $response->json()['data'];
            $pdf = PDF::loadview('adminprodi.seminarproposal.cetaknilaiseminar', compact('data_nilai'))->setPaper('Folio', 'potrait');
            return $pdf->stream();
        }
        return back()->with('toast_error', $response->json()['message']);
    }
}
