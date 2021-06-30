<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class getApiController extends Controller
{
    public function __construct()
    {
        $this->_url = 'http://127.0.0.1:8000/api/v1/admin/';
        $this->_api_key = 'VaKpEbkhOzZitGfIr1RxtGJkCwW43g7fiAnXhDkmyjUY5ezVFm4XdcbPwDBZ';
    }

    public function ajax_prodi($id)
    {
        $response = Http::get($this->_url . 'programstudi/aktif/' . $id, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);
        $data_prodi = $response->json()['data'];
        return json_encode($data_prodi, true);
    }

    public function ajax_kabupaten($id)
    {
        $response = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kota', [
            'id_provinsi' => $id,
        ]);
        $data_kabupaten = $response->json()['kota_kabupaten'];
        return json_encode($data_kabupaten, true);
    }

    public function ajax_kecamatan($id)
    {
        $response = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kecamatan', [
            'id_kota' => $id,
        ]);
        $data_kecamatan = $response->json()['kecamatan'];
        return json_encode($data_kecamatan, true);
    }

    public function ajax_desa($id)
    {
        $response = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kelurahan', [
            'id_kecamatan' => $id,
        ]);
        $data_desa = $response->json()['kelurahan'];
        return json_encode($data_desa, true);
    }
}
