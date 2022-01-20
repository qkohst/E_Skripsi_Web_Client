<?php

namespace App\Http\Controllers\AdminProdi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PersetujuanKRSController extends Controller
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
        $response = Http::get($this->_url . 'persetujuankrs', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);

        if ($response->status() == 200) {
            $data_persetujuan_krs = $response->json()['data'];
            return view('adminprodi.persetujuankrs.index', compact('data_persetujuan_krs'));
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
        $response = Http::post($this->_url . 'persetujuankrs/' . $id, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            '_method'   => 'PATCH',
            'status_persetujuan_admin_prodi_file_krs' => $request->status_persetujuan_admin_prodi_file_krs,
            'catatan_file_krs' => $request->catatan_file_krs,
        ]);
        if ($response->status() == 200) {
            return redirect('/persetujuankrs')->with('success', $response->json()['message']);
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
        //
    }
}
