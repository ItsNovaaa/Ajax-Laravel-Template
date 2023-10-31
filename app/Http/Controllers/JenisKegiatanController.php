<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use App\Models\auditee;
use App\Models\JenisKegiatan;

class JenisKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        if (request()->ajax()) {
            return DataTables::of(JenisKegiatan::select('*'));
        };
        $dataAuditee = auditee::all('*');
        return view('jenisKegiatan.index',compact('dataAuditee'));
    }

    public function Datatable()
    {
        $data = JenisKegiatan::orderBy('nama_kegiatan','asc');
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
            return view('jenisKegiatan.action')->with('data',$data);
        })
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = request()->all();
        $validator = FacadesValidator::make($post, [
            'nama_kegiatan' => 'required',
            'kode_kegiatan' => 'required',
            'id_kegiatan_auditee' => 'required',
            'isaktif_kegiatan' => 'required'
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
                'nama_kegiatan' => $request->nama_kegiatan,
                'kode_kegiatan' => $request->kode_kegiatan,
                'id_kegiatan_auditee' => $request->id_kegiatan_auditee,
                'isaktif_kegiatan' => $request->isaktif_kegiatan
            ];
            JenisKegiatan::create($data);
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
        $data = JenisKegiatan::find($id);
        
        return response()->json(['result'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = JenisKegiatan::find($id);
        $post = request()->all();
        $validator = FacadesValidator::make($post, [
            'nama_kegiatan' => 'required',
            'kode_kegiatan' => 'required',
            'id_kegiatan_auditee' => 'required',
            'isaktif_kegiatan' => 'required'
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
            $data->nama_kegiatan = $request->nama_kegiatan;
            $data->kode_kegiatan = $request->kode_kegiatan;
            $data->id_kegiatan_auditee = $request->id_kegiatan_auditee;
            $data->isaktif_kegiatan = $request->isaktif_kegiatan;
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
        $data = JenisKegiatan::find($id);
        $data->delete();
        return response()->json([
            'status' => 201,
            'data' => $data,
        ]);
    }
}
