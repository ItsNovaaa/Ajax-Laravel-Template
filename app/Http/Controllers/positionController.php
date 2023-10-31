<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use App\Models\position;

class positionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::of(position::select('*'));
        };
        return view('positions.index');
    }

    public function Datatable()
    {
        $data = position::orderBy('nama_position','asc');
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
            return view('positions.action')->with('data',$data);
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
            'nama_position' => 'required',
            'kode_position' => 'required',
            'deskripsi_position' => 'required',
            'isaktif_position' => 'required'
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
                'nama_position' => $request->nama_position,
                'kode_position' => $request->kode_position,
                'deskripsi_position' => $request->deskripsi_position,
                'isaktif_position' => $request->isaktif_position
            ];
            position::create($data);
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
        $data = position::find($id);
        return response()->json(['result'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = position::find($id);
        $post = request()->all();
        $validator = FacadesValidator::make($post, [
            'nama_position' => 'required',
            'kode_position' => 'required',
            'deskripsi_position' => 'required',
            'isaktif_position' => 'required'
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
            $data->nama_position = $request->nama_position;
            $data->kode_position = $request->kode_position;
            $data->deskripsi_position = $request->deskripsi_position;
            $data->isaktif_position = $request->isaktif_position;
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
        $data = position::find($id);
        $data->delete();
        return response()->json([
            'status' => 201,
            'data' => $data,
        ]);
    }
}
