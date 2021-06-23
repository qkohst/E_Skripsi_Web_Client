<?php

namespace App\Http\Controllers\AdminProdi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


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
        //
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
        //
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
