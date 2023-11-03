<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\auditee;
use App\Models\position;
use App\Models\RiskLevel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use App\Models\JenisKegiatan;
use App\Models\RiskKriteria;

class RiskLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (request()->ajax()) {
            return DataTables::of(RiskLevel::select('*'));
        };
        // $modelPosition = position::all('*');
        $modelRisk = RiskLevel::all('*');
        // $Modelkriteria = RiskKriteria::all('*');
        // $modelKegiatan = JenisKegiatan::all('*');
        // $modelauditee = auditee::all('*');
        return view('Risklevel.index',compact('modelRisk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $modelPosition = position::all('*');
        $modelRisk = RiskLevel::all('*');
        $Modelkriteria = RiskKriteria::all('*');
        $modelKegiatan = JenisKegiatan::all('*');
        $modelauditee = auditee::all('*');
        // $modelRiskKegiatan = RiskLevel::with('JenisKegiatan')->get();
        // $modelKegiatan = RiskLevel::with('RiskKriteria')->get();
        // $modelauditee = RiskLevel::with('auditee')->get();
        return view('Risklevel.create',compact( 'modelRisk','modelKegiatan','modelauditee','Modelkriteria'));

        // return view ('Risklevel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = request()->all();
        $validator = FacadesValidator::make($post, [
            // 'nama_staff' => 'required',
            'risk_level_name' => 'required',
            'risk_level_audit' => 'required',
            'risk_level_date' => 'required',
            'risk_level_risk_kriteria' => 'required',
            'risk_level_kegiatan' => 'required',
            'risk_level_total' => 'required',
            'risk_level_risk' => 'required',
            'risk_level_note' => 'required',
            'risk_level_isaktif' => 'required',
        ], [
            'required' => ':attribute harus diisi'
        ]);
        $ModelRiskLevel = new RiskLevel;
        $ModelRiskLevel->risk_level_name = $request->risk_level_name;
        $ModelRiskLevel->risk_level_audit = $request->risk_level_audit;
        $ModelRiskLevel->risk_level_date = $request->risk_level_date;
        $ModelRiskLevel->risk_level_risk_kriteria = $request->risk_level_risk_kriteria;
        $ModelRiskLevel->risk_level_kegiatan = $request->risk_level_kegiatan;
        $ModelRiskLevel->risk_level_total = $request->risk_level_total;
        $ModelRiskLevel->risk_level_risk = $request->risk_level_risk;
        $ModelRiskLevel->risk_level_note = $request->risk_level_risk;
        $ModelRiskLevel->risk_level_isaktif = $request->risk_level_risk;
        $ModelRiskLevel->save();
        return to_route('riskLevel.index')->with('Selamat,Data Telah Disimpan');
            
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
    public function edit($id)
    {
        // $modelPosition = position::all('*');
        $modelRisk = RiskLevel::all();
        // $Modelkriteria = RiskKriteria::all('*');
        // $modelKegiatan = JenisKegiatan::all('*');
        // $modelauditee = auditee::all('*');
        // $modelKegiatan = RiskLevel::with('JenisKegiatan')->get();
        // $Modelkriteria = RiskLevel::with('RiskKriteria')->get();
        // $modelauditee = RiskLevel::with('auditee')->get();
        return view('Risklevel.edit',compact( 'modelRisk'));
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
