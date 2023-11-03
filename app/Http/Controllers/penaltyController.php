<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use App\Models\Staff;
use App\Models\RiskLevel;
use App\Models\auditee;
use App\Models\penalty;



class penaltyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modelPenalty = penalty::all('*');
        return view('penalty.index',compact('modelPenalty'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $modelStaff = Staff::all('*');
        $modelRiskLevel = RiskLevel::all('*');
        $modelAuditee = auditee::all('*');
        $modelPenalty = penalty::all('*');
        // return response()->json([$modelStaff]);
        return view('penalty.create', compact('modelStaff','modelRiskLevel','modelAuditee','modelStaff'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = request()->all();
        $validator = FacadesValidator::make($post, [
            // 'nama_staff' => 'required',
            'penalty_audit' => 'required',
            'penalty_name' => 'required',
            'penalty_staff' => 'required',
            'penalty_risk_level' => 'required',
            'penalty_rate' => 'required',
            'penalty_notes' => 'required',
            'penalty_isaktif' => 'required',
            // 'risk_level_note' => 'required',
            // 'risk_level_isaktif' => 'required',
        ], [
            'required' => ':attribute harus diisi'
        ]);
        $modelPenalty = new penalty;
        $modelPenalty->penalty_audit = $request->penalty_audit;
        $modelPenalty->penalty_name = $request->penalty_name;
        $modelPenalty->penalty_staff = $request->penalty_staff;
        $modelPenalty->penalty_risk_level = $request->penalty_risk_level;
        $modelPenalty->penalty_rate = $request->penalty_rate;
        $modelPenalty->penalty_notes = $request->penalty_notes;
        $modelPenalty->penalty_isaktif = $request->penalty_isaktif;
        // $ModelRiskLevel->risk_level_note = $request->risk_level_risk;
        // $ModelRiskLevel->risk_level_isaktif = $request->risk_level_risk;
        $modelPenalty->save();
        return to_route('penalty.index')->with('Selamat,Data Telah Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
