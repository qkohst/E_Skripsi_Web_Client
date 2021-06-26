<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VerifikasiSeminarController extends Controller
{
    public function __construct()
    {
        $this->_url = 'http://127.0.0.1:8000/api/v1/dosen/seminarproposal';
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
            $verifikasiseminar = $response->json()['data'];
            return view('dosen.verifikasiseminar.index', compact('verifikasiseminar'));
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
        $response_seminar = Http::get($this->_url . '/' . $id, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);

        if ($response_seminar->status() == 200) {
            $data_seminar = $response_seminar->json()['data'];
            if ($data_seminar['status_verifikasi_hasil_seminar_proposal'] == 'Lulus Seminar') {
                $response_nilai = Http::get($this->_url . '/' . $id . '/nilai', [
                    'api_key' => $this->_api_key,
                    'api_token' => session('api_token_user')
                ]);
                $data_nilai = $response_nilai->json()['data'];
                return view('dosen.verifikasiseminar.inputnilai', compact('data_seminar', 'data_nilai'));
            } else {
                return view('dosen.verifikasiseminar.show', compact('data_seminar'));
            }
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
        $response = Http::post($this->_url . '/' . $id, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            '_method'   => 'PATCH',
            'status_verifikasi_hasil_seminar_proposal' => $request->status_verifikasi_hasil_seminar_proposal,
            'catatan_hasil_seminar_proposal' => $request->catatan_hasil_seminar_proposal,
        ]);

        if ($response->status() == 200) {
            if ($request->status_verifikasi_hasil_seminar_proposal == 'Lulus Seminar') {
                $response_nilai = Http::get($this->_url . '/' . $id . '/nilai', [
                    'api_key' => $this->_api_key,
                    'api_token' => session('api_token_user')
                ]);
                $data_seminar = $response->json()['data'];
                $data_nilai = $response_nilai->json()['data'];
                return view('dosen.verifikasiseminar.inputnilai', compact('data_seminar', 'data_nilai'));
            } elseif ($request->status_verifikasi_hasil_seminar_proposal == 'Revisi') {
                return redirect('/verifikasiseminar')->with('success', $response->json()['message']);
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
            'nilai_a1_hasil_seminar_proposal' => $request->nilai_a1_hasil_seminar_proposal,
            'nilai_a2_hasil_seminar_proposal' => $request->nilai_a2_hasil_seminar_proposal,
            'nilai_a3_hasil_seminar_proposal' => $request->nilai_a3_hasil_seminar_proposal,
            'nilai_b1_hasil_seminar_proposal' => $request->nilai_b1_hasil_seminar_proposal,
            'nilai_b2_hasil_seminar_proposal' => $request->nilai_b2_hasil_seminar_proposal,
            'nilai_b3_hasil_seminar_proposal' => $request->nilai_b3_hasil_seminar_proposal,
            'nilai_b4_hasil_seminar_proposal' => $request->nilai_b4_hasil_seminar_proposal,
            'nilai_b5_hasil_seminar_proposal' => $request->nilai_b5_hasil_seminar_proposal,
            'nilai_b6_hasil_seminar_proposal' => $request->nilai_b6_hasil_seminar_proposal,
            'nilai_b7_hasil_seminar_proposal' => $request->nilai_b7_hasil_seminar_proposal,
            'nilai_c1_hasil_seminar_proposal' => $request->nilai_c1_hasil_seminar_proposal,
            'nilai_c2_hasil_seminar_proposal' => $request->nilai_c2_hasil_seminar_proposal,
            'nilai_c3_hasil_seminar_proposal' => $request->nilai_c3_hasil_seminar_proposal,
        ]);

        if ($response->status() == 200) {
            return redirect('/verifikasiseminar')->with('success', $response->json()['message']);
        }
        return back()->with('toast_error', $response->json()['message']);
    }
}
