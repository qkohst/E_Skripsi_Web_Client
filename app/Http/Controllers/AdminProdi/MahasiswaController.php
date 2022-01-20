<?php

namespace App\Http\Controllers\AdminProdi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->_url = 'http://103.179.57.109/api/v1/adminprodi/';
        $this->_api_key = 'VaKpEbkhOzZitGfIr1RxtGJkCwW43g7fiAnXhDkmyjUY5ezVFm4XdcbPwDBZ';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get($this->_url . 'mahasiswa', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);

        if ($response->status() == 200) {
            $data_mahasiswa = $response->json()['data'];
            return view('adminprodi.mahasiswa.index', compact('data_mahasiswa'));
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
        $response = Http::post($this->_url . 'mahasiswa', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'npm_mahasiswa' => $request->npm_mahasiswa,
            'semester_mahasiswa' => $request->semester_mahasiswa,
            'tempat_lahir_mahasiswa' => $request->tempat_lahir_mahasiswa,
            'tanggal_lahir_mahasiswa' => $request->tanggal_lahir_mahasiswa,
            'jenis_kelamin_mahasiswa' => $request->jenis_kelamin_mahasiswa,
        ]);
        if ($response->status() == 201) {
            return back()->with('success', $response->json()['message']);
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
        $response = Http::get($this->_url . 'mahasiswa/' . $id, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);
        if ($response->status() == 200) {
            $data_mahasiswa = $response->json()['data'];
            return view('adminprodi.mahasiswa.show', compact('data_mahasiswa'));
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
        $response = Http::post($this->_url . 'mahasiswa/' . $id, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            '_method'   => 'PATCH',
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'tempat_lahir_mahasiswa' => $request->tempat_lahir_mahasiswa,
            'tanggal_lahir_mahasiswa' => $request->tanggal_lahir_mahasiswa,
            'status_mahasiswa' => $request->status_mahasiswa,
        ]);
        if ($response->status() == 200) {
            return redirect('/mahasiswa')->with('success', $response->json()['message']);
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
        $response = Http::post($this->_url . 'mahasiswa/' . $id, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            '_method'   => 'DELETE',
        ]);
        if ($response->status() == 200) {
            return back()->with('success', $response->json()['message']);
        }
        return back()->with('toast_error', $response->json()['message']);
    }

    public function riset_password(Request $request, $id)
    {
        $response = Http::post($this->_url . 'mahasiswa/' . $id . '/resetpassword', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            '_method'   => 'PATCH',
            'npm_mahasiswa' => $request->npm_mahasiswa,
        ]);
        if ($response->status() == 205) {
            return redirect('/mahasiswa')->with('success', $response->json()['message']);
        }
        return back()->with('toast_error', $response->json()['message']);
    }
}
