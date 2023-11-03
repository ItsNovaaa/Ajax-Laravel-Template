@extends('layouts.implementation')
@section('content')
<div class="card">
    <h5 class="card-header py-3 fw-bold" style="background: none; color: #2B3674;">Penalty</h5>
    <div class="card-body">
    <form action="{{ route('penalty.store') }}" method="POST">
        @csrf
      <div class="d-flex row">
        <div class="mb-4 col col-md-3 mx-3 px-1">
            <span class="fw-bold">Audit Types</span>      
            <select name="penalty_audit" id="penalty_audit" class="form-select" placeholder="Insert Kode Kegiatan" aria-label="Default select example">
                <option value="" selected>Insert Audit</option>
                @foreach ($modelAuditee as $dataauditee)
                    <option name="penalty_audit" value="{{ $dataauditee->id_auditee }}">{{ $dataauditee->nama_auditee }}</option>
                @endforeach
            </select>
        </div>    
        <div class="mb-4 col col-md-3 px-1">
            <span class="fw-bold">Risk Name</span>
            <input class="form-control" type="text" name="penalty_name"  placeholder="Insert Username" aria-label="default input example" id="penalty_name">
        </div>
      </div>
        <table class="table" id="datatable">
            <thead>
                <tr style="width: 100px" >
                    {{-- <th style="width: 100px">No</th> --}}
                    <th colspan="2" style="width: 100px">Staff</th>
                    <th colspan="2" style="width: 100px">Risk Level</th>
                    <th colspan="1" style="width: 100px">Penalty</th>
                    {{-- <th colspan="1" style="width: 100px">Risk (%)</th> --}}
                    <th colspan="3" style="width: 100px">Notes</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2">      
                        <select id="penalty_staff" name="penalty_staff" class="form-select" aria-label="Default select example">
                            <option value="" selected disabled>Insert Staff</option>
                            @foreach ($modelStaff as $dataStaff)
                                <option value="{{ $dataStaff->id_staff }}">{{ $dataStaff->nama_staff }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td colspan="2">      
                        <select id="penalty_risk_level" name="penalty_risk_level" class="form-select" placeholder="Insert Kode Kegiatan" aria-label="Default select example">
                            <option value="" selected>Risk Level</option>
                            @foreach ($modelRiskLevel as $dataKegiatan)
                                <option value="{{ $dataKegiatan->risk_level_id }}">{{ $dataKegiatan->risk_level_name }}</option>
                            @endforeach
                        </select>                        
                    </td>
                    <td colspan="1">      
                        <input class="form-control" type="text" name="penalty_rate"  placeholder="1-10" aria-label="default input example" id="penalty_rate">
                    </td>
                    {{-- <td colspan="1">      
                        <input class="form-control" type="text" name="risk_level_risk"  placeholder="Total" aria-label="default input example" id="risk_level_risk">
                    </td> --}}
                    <td colspan="3">      
                        <input class="form-control" type="text" name="penalty_notes"  placeholder="Total" aria-label="default input example" id="penalty_notes">
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="mb-4 mx-1 row d-flex">
            <span class="mb-2 fw-bold">Risk Kriteria</span>
            <div class="d-flex ">
                <div class="form-check ml-4">
                    <input class="form-check-input" type="radio" name="penalty_isaktif" id="penalty_isaktif_active" value="1">
                    <label class="form-check-label" for="penalty_isaktif_active">
                        Active
                    </label>
                </div>
                <div class="form-check mx-4">
                    <input class="form-check-input" type="radio" name="penalty_isaktif" id="penalty_isaktif_non" value="0" style="border-radius: 18px;border: 1px solid #A3AED0;">
                    <label class="form-check-label" for="penalty_isaktif_non">
                        Non Active
                    </label>
                </div>
                
            </div>
          </div>
          <div class=" d-flex mx-2 justify-content-end" style="padding-top: 20vh">
            <button type="submit" class="ml-2 btn btn-primary" style="border-radius: 8px;background: linear-gradient(90deg, #217AFF 0%, #7F2DE7 100%);">Save Data</button>
            <a href="{{ route('penalty.index') }}" type="button"  class="mx-2 btn" style="border-radius: 8px; border-color:#DA3E33; color:#DA3E33">Discard</a>
          </div>
        </div>
    </form>
  </div>
@endsection