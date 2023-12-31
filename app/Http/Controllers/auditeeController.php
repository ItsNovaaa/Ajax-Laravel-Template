<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
// use App\Http\Controllers\Validator;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use App\Models\auditee;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Support\Facades\Redirect;
use IntlChar;
use PhpParser\Node\Expr\Throw_;
use Throwable;

use function PHPUnit\Framework\throwException;

class auditeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::of(auditee::select('*'));
        };
        return view('admin.index');
    }

    public function Datatable()
    {
        $data = auditee::orderBy('nama_auditee','asc');
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
            return view('admin.action')->with('data',$data);
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
        // return 'dor';
        $post = request()->all();
        $validator = FacadesValidator::make($post, [
            'nama_auditee' => 'required',
            'kode_auditee' => 'required',
            'isaktif_auditee' => 'required',
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
                'nama_auditee' => $request->nama_auditee,
                'kode_auditee' => $request->kode_auditee,
                'isaktif_auditee' => $request->isaktif_auditee
            ];
            auditee::create($data);
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
        try{
            $modelAudite = new auditee();
            $findAudite = $modelAudite::find($id);
            
            if (!$findAudite) {
                return response()->json(['error' => 'Data Not Found'], 404);
            }
            
            return response()->json($findAudite);

        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = auditee::find($id);
        return response()->json(['result'=>$data]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // if ($data);
        $data = auditee::find($id);
        $post = request()->all();
        $validator = FacadesValidator::make($post, [
            'nama_auditee' => 'required',
            'kode_auditee' => 'required',
            'isaktif_auditee' => 'required',
        ], [
            'required' => ':attribute harus diisi'
        ]);
        if ($validator->fails()) {
            return response()->json ([
                'message'  => 'Terjadi kesalahan input',
                'errors' => $validator->errors()
            ]);
        } else {
            if($data) {
                $data->nama_auditee = $request->nama_auditee;
                $data->kode_auditee = $request->kode_auditee;
                $data->isaktif_auditee = $request->isaktif_auditee;
                $data->save();
                return response()->json([
                    'success' => true,
                    'data' => $data, 
                    'message' => 'data berhasil di up'
                ]);
            }
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = auditee::find($id);
        $data->delete();
        return response()->json([
            'status' => 201,
            'data' => $data,
        ]);
    }
}
