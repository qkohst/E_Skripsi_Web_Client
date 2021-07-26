<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class AdminProdiController extends Controller
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
        $response = Http::get($this->_url . 'adminprodi', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);

        if ($response->status() == 200) {
            $response_fakultas = Http::get($this->_url . 'fakultas/aktif', [
                'api_key' => $this->_api_key,
                'api_token' => session('api_token_user'),
            ]);
            $data_fakultas = $response_fakultas->json()['data'];

            $data_adminprodi = $response->json()['data'];
            return view('admin.adminprodi.index', compact('data_adminprodi', 'data_fakultas'));
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
        if ($request->hasFile('foto_admin_prodi')) {
            $foto_admin_prodi         = request('foto_admin_prodi');
            $foto_admin_prodi_path          = $foto_admin_prodi->getPathname();
            $foto_admin_prodi_uploaded_name = $foto_admin_prodi->getClientOriginalName();

            $file = fopen($foto_admin_prodi_path, 'r');

            $response = Http::attach(
                'foto_admin_prodi',
                $file,
                $foto_admin_prodi_uploaded_name
            )->post($this->_url . 'adminprodi', [
                'api_key' => $this->_api_key,
                'api_token' => session('api_token_user'),
                'program_studi_id_program_studi' => $request->program_studi_id_program_studi,
                'nik_admin_prodi' => $request->nik_admin_prodi,
                'nidn_admin_prodi' => $request->nidn_admin_prodi,
                'nip_admin_prodi' => $request->nip_admin_prodi,
                'nama_admin_prodi' => $request->nama_admin_prodi,
                'tempat_lahir_admin_prodi' => $request->tempat_lahir_admin_prodi,
                'tanggal_lahir_admin_prodi' => $request->tanggal_lahir_admin_prodi,
                'jenis_kelamin_admin_prodi' => $request->jenis_kelamin_admin_prodi,
                'no_surat_tugas_admin_prodi' => $request->no_surat_tugas_admin_prodi,
                'email_admin_prodi' => $request->email_admin_prodi,
                'no_hp_admin_prodi' => $request->no_hp_admin_prodi,
            ]);
            if ($response->status() == 201) {
                return back()->with('success', $response->json()['message']);
            }
            return back()->with('toast_error', $response->json()['message']);
        }
        $response = Http::post($this->_url . 'adminprodi', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            'program_studi_id_program_studi' => $request->program_studi_id_program_studi,
            'nik_admin_prodi' => $request->nik_admin_prodi,
            'nidn_admin_prodi' => $request->nidn_admin_prodi,
            'nip_admin_prodi' => $request->nip_admin_prodi,
            'nama_admin_prodi' => $request->nama_admin_prodi,
            'tempat_lahir_admin_prodi' => $request->tempat_lahir_admin_prodi,
            'tanggal_lahir_admin_prodi' => $request->tanggal_lahir_admin_prodi,
            'jenis_kelamin_admin_prodi' => $request->jenis_kelamin_admin_prodi,
            'no_surat_tugas_admin_prodi' => $request->no_surat_tugas_admin_prodi,
            'email_admin_prodi' => $request->email_admin_prodi,
            'no_hp_admin_prodi' => $request->no_hp_admin_prodi,
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
        $response = Http::get($this->_url . 'adminprodi/' . $id, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
        ]);
        if ($response->status() == 200) {
            $data_adminprodi = $response->json()['data'];
            return view('admin.adminprodi.show', compact('data_adminprodi'));
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
        $response = Http::post($this->_url . 'adminprodi/' . $id, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            '_method'   => 'PATCH',
            'nama_admin_prodi' => $request->nama_admin_prodi,
            'nip_admin_prodi' => $request->nip_admin_prodi,
            'nik_admin_prodi' => $request->nik_admin_prodi,
        ]);
        if ($response->status() == 200) {
            return back()->with('success', $response->json()['message']);
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
        $response = Http::post($this->_url . 'adminprodi/' . $id, [
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
        $response = Http::post($this->_url . 'adminprodi/' . $id . '/resetpassword', [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            '_method'   => 'PATCH',
            'nidn_admin_prodi' => $request->nidn_admin_prodi,
        ]);
        // dd($response->status());
        if ($response->status() == 205) {
            return back()->with('success', $response->json()['message']);
        }
        return back()->with('toast_error', $response->json()['message']);
    }
}
