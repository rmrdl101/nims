<?php

namespace App\Http\Controllers\Dashboard\CommonForms\NSO;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\CommonForms\NSO\InspectionAcceptanceReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PDF;

class InspectionAcceptanceReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.common-forms.nso.inspection-acceptance-report.index', [
            // navigation
            'tree' => 'Common Forms',
            'branch' => 'NSO',
            'twig' => 'Inspection Acceptance Report',
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
     * @param  \App\Models\Dashboard\CommonForms\NSO\InspectionAcceptanceReport  $inspectionAcceptanceReport
     * @return \Illuminate\Http\Response
     */
    public function show(InspectionAcceptanceReport $inspectionAcceptanceReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard\CommonForms\NSO\InspectionAcceptanceReport  $inspectionAcceptanceReport
     * @return \Illuminate\Http\Response
     */
    public function edit(InspectionAcceptanceReport $inspectionAcceptanceReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dashboard\CommonForms\NSO\InspectionAcceptanceReport  $inspectionAcceptanceReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InspectionAcceptanceReport $inspectionAcceptanceReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard\CommonForms\NSO\InspectionAcceptanceReport  $inspectionAcceptanceReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(InspectionAcceptanceReport $inspectionAcceptanceReport)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdf()
    {
//        return view('dashboard.common-forms.nso.inspection-acceptance-report.iar-pdf');
        $pdf = PDF::loadView('dashboard.common-forms.nso.inspection-acceptance-report.iar-pdf');
        return $pdf->setPaper('a4','portrait')
            ->stream();

    }
}
