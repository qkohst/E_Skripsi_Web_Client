<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class SkripsiController extends Controller
{
    public function __construct()
    {
        $this->_url = 'http://103.179.57.109/api/v1/admin/';
        $this->_api_key = 'VaKpEbkhOzZitGfIr1RxtGJkCwW43g7fiAnXhDkmyjUY5ezVFm4XdcbPwDBZ';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response_seminar = Http::get($this->_url . 'seminarproposal', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);
        $response_sidang = Http::get($this->_url . 'sidangskripsi', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);

        if ($response_seminar->status() == 200) {
            $data_seminar = $response_seminar->json()['data'];
            $data_sidang = $response_sidang->json()['data'];
            return view('admin.skripsi.index', compact('data_seminar', 'data_sidang'));
        }
        return back()->with('toast_error', $response_seminar->json()['message']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail_seminar($id)
    {
        $response = Http::get($this->_url . 'seminarproposal/' . $id, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);
        if ($response->status() == 200) {
            $data_seminar = $response->json()['data'];
            return view('admin.skripsi.detailseminar', compact('data_seminar'));
        }
        return back()->with('toast_error', $response->json()['message']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail_sidang($id)
    {
        $response = Http::get($this->_url . 'sidangskripsi/' . $id, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);
        if ($response->status() == 200) {
            $data_sidang = $response->json()['data'];
            return view('admin.skripsi.detailsidang', compact('data_sidang'));
        }
        return back()->with('toast_error', $response->json()['message']);
    }
}
