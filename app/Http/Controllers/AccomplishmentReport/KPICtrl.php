<?php

namespace App\Http\Controllers\AccomplishmentReport;

use App\Http\Controllers\Controller;
use App\Models\KPI;
use Illuminate\Http\Request;

class KPICtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('accomplishment-reports.key-performance-indicators.index', [
            // navigation
            'tree' => 'Accomplishment Report',
            'branch' => 'Key Performance Indicators',
            'twig' => '',
            'leaves' => ''
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
     * @param  \App\Models\KPI  $kPI
     * @return \Illuminate\Http\Response
     */
    public function show(KPI $kPI)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KPI  $kPI
     * @return \Illuminate\Http\Response
     */
    public function edit(KPI $kPI)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KPI  $kPI
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KPI $kPI)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KPI  $kPI
     * @return \Illuminate\Http\Response
     */
    public function destroy(KPI $kPI)
    {
        //
    }
}
