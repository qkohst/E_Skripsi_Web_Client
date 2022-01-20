<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->_url = 'http://103.179.57.109/api/v1/admin/profile';
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
            $profile = $response->json()['data'];
            return view('admin.profile.index', compact('profile'));
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
        if ($request->hasFile('foto_admin')) {
            $foto_admin         = request('foto_admin');
            $foto_admin_path          = $foto_admin->getPathname();
            $foto_admin_uploaded_name = $foto_admin->getClientOriginalName();

            $file = fopen($foto_admin_path, 'r');

            $response = Http::attach(
                'foto_admin',
                $file,
                $foto_admin_uploaded_name
            )->post($this->_url, [
                'api_key' => $this->_api_key,
                'api_token' => session('api_token_user'),
                'nama_admin' => $request->nama_admin,
                'nidn_admin' => $request->nidn_admin,
                'nip_admin' => $request->nip_admin,
                'nik_admin' => $request->nik_admin,
                'tempat_lahir_admin' => $request->tempat_lahir_admin,
                'tanggal_lahir_admin' => $request->tanggal_lahir_admin,
                'jenis_kelamin_admin' => $request->jenis_kelamin_admin,
                'email_admin' => $request->email_admin,
                'no_hp_admin' => $request->no_hp_admin,
            ]);

            if ($response->status() == 200) {
                return redirect('/dashboard')->with('success', $response->json()['message']);
            }
            return back()->with('toast_error', $response->json()['message']);
        }
        $response = Http::post($this->_url, [
            'api_key' => $this->_api_key,
            'api_token' => session('api_token_user'),
            'nama_admin' => $request->nama_admin,
            'nidn_admin' => $request->nidn_admin,
            'nip_admin' => $request->nip_admin,
            'nik_admin' => $request->nik_admin,
            'tempat_lahir_admin' => $request->tempat_lahir_admin,
            'tanggal_lahir_admin' => $request->tanggal_lahir_admin,
            'jenis_kelamin_admin' => $request->jenis_kelamin_admin,
            'email_admin' => $request->email_admin,
            'no_hp_admin' => $request->no_hp_admin,
        ]);
        if ($response->status() == 200) {
            return redirect('/dashboard')->with('success', $response->json()['message']);
        }
        return back()->with('toast_error', $response->json()['message']);
    }
}
