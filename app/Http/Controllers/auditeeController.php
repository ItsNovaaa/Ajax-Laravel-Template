<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
// use App\Http\Controllers\Validator;
use Illuminate\Support\Facades\Validator;
use App\Models\auditee;
use PhpParser\Node\Expr\Throw_;
use Throwable;

class auditeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auditee.index');
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
        try{
            $rules = [
                'nama' => 'required',
                'kode' => 'required|unique:auditee,kode_auditee',
                'isaktif' => 'required',
            ];
            
            $validator = Validator::make($rules, [
                'required' => 'The :attribute field is required.',
            ]);
            
            if ($validator->fails()) {
                // Validation failed, handle the errors
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $modelAudite = new auditee();
            $modelAudite->nama = $request->nama_auditee;
            $modelAudite->kode = $request->kode_auditee;
            $modelAudite->isaktif = $request->isaktif_auditee;

            $modelAudite->save();

            return response()->json([
                'data' => $modelAudite,
                'status' => 'created',
                'code' => 201

            ]);

        } catch (Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
            ]);
        }
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
