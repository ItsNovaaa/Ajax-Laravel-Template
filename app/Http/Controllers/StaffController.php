<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use App\Models\position;
use App\Models\auditee;
use App\Models\staff;


class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        if (request()->ajax()) {
            return DataTables::of(staff::select('*'));
        };
        $dataposition = position::all('*');
        $dataStaff = auditee::all('*');
        return view('staff.index',compact('dataStaff', 'dataposition'));
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
        $data = staff::orderBy('nama_staff','asc');
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
            return view('staff.action')->with('data',$data);
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
            'nama_staff' => 'required',
            'username_staff' => 'required',
            'nomor_staff' => 'required',
            'id_staff_auditee' => 'required',
            'id_staff_position' => 'required',
            'isaktif_staff' => 'required',
        ], [
            'required' => ':attribute harus diisi'
        ]);
        if ($validator->fails()) {
            return response()->json ([
                'message'  => 'Terjadi kesalahan input',
                'errors' => $validator->errors()
            ]);
        } else {
            $data = [
                'nama_staff' => $request->nama_staff,
                'username_staff' => $request->username_staff,
                'nomor_staff' => $request->nomor_staff,
                'id_staff_auditee' => $request->id_staff_auditee,
                'id_staff_position' => $request->id_staff_position,
                'isaktif_staff' => $request->isaktif_staff
            ];
            staff::create($data);
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
        $data = staff::find($id);
        
        return response()->json(['result'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = staff::find($id);
        $post = request()->all();
        $validator = FacadesValidator::make($post, [
            'nama_staff' => 'required',
            'username_staff' => 'required',
            'nomor_staff' => 'required',
            'id_staff_auditee' => 'required',
            'id_staff_position' => 'required',
            'isaktif_staff' => 'required',
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
            $data->nama_staff = $request->nama_staff;
            $data->username_staff = $request->username_staff;
            // $data->id_kegiatan_auditee = $request->id_kegiatan_auditee;
            $data->nomor_staff = $request->nomor_staff;
            $data->id_staff_auditee = $request->id_staff_auditee;
            $data->id_staff_position = $request->id_staff_position;
            $data->isaktif_staff = $request->isaktif_staff;
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
        $data = staff::find($id);
        $data->delete();
        return response()->json([
            'status' => 201,
            'data' => $data,
        ]);
    }
}
