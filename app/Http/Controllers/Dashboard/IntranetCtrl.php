<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Intranet;
use Illuminate\Http\Request;

class IntranetCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.document-manager.index', [
            // navigation
            'tree' => 'Intranet',
            'branch' => '',
            'twig' => '',
            'leaves' => '',
        ]);
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
     * @param  \App\Models\Dashboard\Intranet  $intranet
     * @return \Illuminate\Http\Response
     */
    public function show(Intranet $intranet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard\Intranet  $intranet
     * @return \Illuminate\Http\Response
     */
    public function edit(Intranet $intranet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dashboard\Intranet  $intranet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Intranet $intranet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard\Intranet  $intranet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Intranet $intranet)
    {
        //
    }
}
