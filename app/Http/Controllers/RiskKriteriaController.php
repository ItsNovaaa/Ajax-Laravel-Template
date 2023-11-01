<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use App\Models\RiskKriteria;

class RiskKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::of(RiskKriteria::select('*'));
        };
        return view('riskKriteria.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function Datatable()
    {
        $data = RiskKriteria::orderBy('nama_risk','asc');
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
            return view('riskKriteria.action')->with('data',$data);
        })
        ->make(true);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = request()->all();
        $validator = FacadesValidator::make($post, [
            'nama_risk' => 'required',
            'kode_risk' => 'required',
            'level_risk' => 'required',
            'isaktif_risk' => 'required'
        ],
        [
            'required' => ':attribute harus diisi'
        ]);
        if ($validator->fails()) {
            return response()->json ([
                'message'  => 'Terjadi kesalahan input',
                'errors' => $validator->errors()
            ]);
        } else {
            $data = [
                'nama_risk' => $request->nama_risk,
                'kode_risk' => $request->kode_risk,
                'level_risk' => $request->level_risk,
                'isaktif_risk' => $request->isaktif_risk
            ];
            RiskKriteria::create($data);
            return response()->json([
                'success' => true,
                'data' => $data, 
                'message' => 'data berhasil di simpan'
            ]);
        };
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
        $data = RiskKriteria::find($id);
        return response()->json(['result'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = RiskKriteria::find($id);
        $post = request()->all();
        $validator = FacadesValidator::make($post, [
            'nama_risk' => 'required',
            'kode_risk' => 'required',
            'level_risk' => 'required',
            'isaktif_risk' => 'required'
        ],
        [
            'required' => ':attribute harus diisi'
        ]);
        if ($validator->fails()) {
            return response()->json ([
                'message'  => 'Terjadi kesalahan input',
                'errors' => $validator->errors()
            ]);
        } else {
           if($data){
            $data->nama_risk = $request->nama_risk;
            $data->kode_risk = $request->kode_risk;
            $data->level_risk = $request->level_risk;
            $data->isaktif_risk = $request->isaktif_risk;
            $data->save(); 
           }
            return response()->json([
                'success' => true,
                'data' => $data, 
                'message' => 'data berhasil di simpan'
            ]);
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = RiskKriteria::find($id);
        $data->delete();
        return response()->json([
            'status' => 201,
            'data' => $data,
        ]);
    }
}
