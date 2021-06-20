<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ProdiController extends Controller
{
    public function __construct()
    {
        $this->_url = 'http://127.0.0.1:8000/api/v1/admin/';
        $this->_api_key = 'VaKpEbkhOzZitGfIr1RxtGJkCwW43g7fiAnXhDkmyjUY5ezVFm4XdcbPwDBZ';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response_prodi = Http::get($this->_url . 'programstudi', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);
        $response_fakultas = Http::get($this->_url . 'fakultas/aktif', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);
        if ($response_prodi->status() == 200) {
            $data_prodi = $response_prodi->json()['data'];
            $data_fakultas = $response_fakultas->json()['data'];

            return view('admin.prodi.index', compact('data_prodi', 'data_fakultas'));
        }
        return back()->with('toast_error', $response_prodi->json()['message']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = Http::post($this->_url . 'programstudi', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            'fakultas_id_fakultas' => $request->kode_fakultas,
            'kode_program_studi' => $request->kode_program_studi,
            'nama_program_studi' => $request->nama_program_studi,
            'singkatan_program_studi' => $request->singkatan_program_studi,
        ]);

        if ($response->status() == 201) {
            return back()->with('success', $response->json()['message']);
        }
        // dd($response->json());
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = Http::get($this->_url . 'programstudi/' . $id, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);
        if ($response->status() == 200) {
            $data_prodi = $response->json()['data'];
            return view('admin.prodi.edit', compact('data_prodi'));
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
        $response = Http::post($this->_url . 'programstudi/' . $id, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            '_method'   => 'PATCH',
            'nama_program_studi' => $request->nama_program_studi,
            'singkatan_program_studi' => $request->singkatan_program_studi,
            'status_program_studi' => $request->status_program_studi,
        ]);
        if ($response->status() == 200) {
            return redirect('/prodi')->with('success', $response->json()['message']);
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
        $response = Http::post($this->_url . 'programstudi/' . $id, [
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
