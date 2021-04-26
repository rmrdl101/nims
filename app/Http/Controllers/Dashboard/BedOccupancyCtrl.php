<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BedOccupancy;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BedOccupancyCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::where('slug','!=','admin')
            ->where('slug','!=','out-patient-department')
            ->where('slug','!=','central-supply-room')
            ->where('slug','!=','infection-prevention-control-committee')
            ->get();
                $fbConfig = '{
                    apiKey: "AIzaSyAMF2WKF0FQC1qN3cJgnij5N5LUm1fYDiM",
                    authDomain: "tdh-nims.firebaseapp.com",
                    databaseURL: "https://tdh-nims.firebaseio.com",
                    projectId: "tdh-nims",
                    storageBucket: "tdh-nims.appspot.com",
                    messagingSenderId: "55371576550",
                    appId: "1:55371576550:web:b083120a2ec8ef9faff727"
                }';

//                $dataA = BedOccupancy::all()->where('field', '=', 'ER')->first();

        return view('dashboard.bed-occupancy.index', [
            // navigation
            'tree' => 'Dashboard',
            'branch' => 'Bed Occupancy',
            'twig' => '',
            'leaves' => '',

            'fbConf' => $fbConfig,
            'departments' => $departments
//                    'dataA' => $dataA
        ]);

    }


    public function overview()
    {
        return view('dashboard.bed-occupancy.overview', [
            // navigation
            'tree' => 'Main',
            'branch' => 'Bed Occupancy Overview'
        ]);
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
     * @param  \App\Models\BedOccupancy  $bedOccupancy
     * @return \Illuminate\Http\Response
     */
    public function show(BedOccupancy $bedOccupancy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BedOccupancy  $bedOccupancy
     * @return \Illuminate\Http\Response
     */
    public function edit(BedOccupancy $bedOccupancy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BedOccupancy  $bedOccupancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BedOccupancy $bedOccupancy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BedOccupancy  $bedOccupancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(BedOccupancy $bedOccupancy)
    {
        //
    }
}
