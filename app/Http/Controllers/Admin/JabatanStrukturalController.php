<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class JabatanStrukturalController extends Controller
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
        $response = Http::get($this->_url . 'jabatanstruktural', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);

        if ($response->status() == 200) {
            $data_jabatanstruktural = $response->json()['data'];
            return view('admin.jabatanstruktural.index', compact('data_jabatanstruktural'));
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
        $response = Http::post($this->_url . 'jabatanstruktural', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            'nama_jabatan_struktural' => $request->nama_jabatan_struktural,
            'deskripsi_jabatan_struktural' => $request->deskripsi_jabatan_struktural,
        ]);

        if ($response->status() == 201) {
            return back()->with('success', $response->json()['message']);
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
        $response = Http::post($this->_url . 'jabatanstruktural/' . $id, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            '_method'   => 'PATCH',
            'deskripsi_jabatan_struktural' => $request->deskripsi_jabatan_struktural,
        ]);
        if ($response->status() == 200) {
            return redirect('/jabatanstruktural')->with('success', $response->json()['message']);
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
        $response = Http::post($this->_url . 'jabatanstruktural/' . $id, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            '_method'   => 'DELETE',
        ]);
        if ($response->status() == 200) {
            return back()->with('success', $response->json()['message']);
        }
        return back()->with('toast_error', $response->json()['message']);
    }
}
