@extends('layouts.implementation')
@section('content')
<div class="card">
    <h5 class="card-header py-3 fw-bold" style="background: none; color: #2B3674;">Risk Assesment</h5>
    <div class="card-body">
    <form action="{{ route('riskLevel.update') }}" method="POST">
        @csrf
        @method('PUT')
      <div class="d-flex row">
        <div class="mb-4 col col-md-3 mx-3 px-1">
            <span class="fw-bold">Audit Types</span>      
            <select name="risk_level_audit" id="risk_level_audit" class="form-select" placeholder="Insert Kode Kegiatan" aria-label="Default select example">
                {{-- @foreach ($modelauditee as $dataauditee)
                <option value="{{ $dataauditee->risk_level_audit }}" selected>{{ $dataauditee->auditee->nama_auditee }}</option>
                @endforeach --}}
                {{-- @foreach ($modelRisk as $dataauditee)
                    <option name="risk_level_audit" value="{{ $dataauditee->auditee->id_auditee }}">{{ $dataauditee->auditee->nama_auditee }}</option>
                @endforeach --}}
            </select>
        </div>
        <div class="mb-4 col col-md-3 px-1">
            <span class="fw-bold">Period</span>      
            <select name="risk_level_date" id="risk_level_date" class="form-select" placeholder="Insert Kode Kegiatan" aria-label="Default select example">
                <option value="" disabled>Insert Period</option>
                <option name="risk_level_date" value="2023">2023</option>
                <option name="risk_level_date" value="2023">2024</option>
            </select>
        </div>      
        <div class="mb-4 col col-md-3 px-1">
            <span>Risk Name</span>
            <input class="form-control" type="text" name="risk_level_name"  placeholder="Insert Username" aria-label="default input example" id="risk_level_name">
        </div>
      </div>
        <table class="table" id="datatable">
            <thead>
                <tr style="width: 100px" >
                    {{-- <th style="width: 100px">No</th> --}}
                    <th colspan="2" style="width: 100px">Risk Kriteria</th>
                    <th colspan="2" style="width: 100px">Type Of Acticity</th>
                    <th colspan="1" style="width: 100px">Total</th>
                    <th colspan="1" style="width: 100px">Risk (%)</th>
                    <th colspan="3" style="width: 100px">Notes</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2">      
                        <select id="risk_level_risk_kriteria"  name="risk_level_risk_kriteria" class="form-select" placeholder="Insert Kode Kegiatan" aria-label="Default select example">
                            {{-- <option value="" selected>Insert Risk Kriteria</option> --}}
                            {{-- @foreach ($modelRisk as $datakriteria)
                                <option name="risk_level_risk_kriteria" value="{{ $datakriteria->RiskKriteria->id_risk }}">{{ $datakriteria->RiskKriteria->nama_risk }}</option>
                            @endforeach --}}
                        </select>
                    </td>
                    <td colspan="2">      
                        <select id="risk_level_kegiatan" name="risk_level_kegiatan" class="form-select" placeholder="Insert Kode Kegiatan" aria-label="Default select example">
                            {{-- <option value="" selected>Insert Kegiatan</option> --}}
                            {{-- @foreach ($modelRisk as $dataKegiatan)
                                <option value="{{ $dataKegiatan->jenisKegiatan->risk_level_kegiatan }}">{{ $dataKegiatan->jenisKegiatan->nama_kegiatan }}</option>
                            @endforeach --}}
                        </select>                        
                    </td>
                    <td colspan="1">      
                        <input class="form-control" type="text" name="risk_level_total"  placeholder="Total" aria-label="default input example" id="username_staff">
                    </td>
                    <td colspan="1">      
                        <input class="form-control" type="text" name="risk_level_risk"  placeholder="Total" aria-label="default input example" id="risk_level_risk">
                    </td>
                    <td colspan="3">      
                        <input class="form-control" type="text" name="risk_level_note"  placeholder="Total" aria-label="default input example" id="risk_level_note">
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="mb-4 mx-1 row d-flex">
            <span class="mb-2 fw-bold">Risk Kriteria</span>
            <div class="d-flex ">
                <div class="form-check ml-4">
                    <input class="form-check-input" type="radio" name="risk_level_isaktif" id="risk_level_isaktif_active" value="1">
                    <label class="form-check-label" for="risk_level_isaktif_active">
                        Active
                    </label>
                </div>
                <div class="form-check mx-4">
                    <input class="form-check-input" type="radio" name="risk_level_isaktif" id="risk_level_isaktif_non" value="0" style="border-radius: 18px;border: 1px solid #A3AED0;">
                    <label class="form-check-label" for="risk_level_isaktif_non">
                        Non Active
                    </label>
                </div>
                
            </div>
          </div>
          <div class=" d-flex mx-2 justify-content-end" style="padding-top: 20vh">
            <button type="submit" class="ml-2 btn btn-primary" style="border-radius: 8px;background: linear-gradient(90deg, #217AFF 0%, #7F2DE7 100%);">Save Data</button>
            <a href="{{ route('riskLevel.index') }}" type="button"  class="mx-2 btn" style="border-radius: 8px; border-color:#DA3E33; color:#DA3E33">Discard</a>
          </div>
        </div>
    </form>
  </div>
@endsection