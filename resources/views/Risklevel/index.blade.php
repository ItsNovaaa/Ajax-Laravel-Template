@extends('layouts.main')
@section('content')
{{-- <h1 class="text-center mb-5">BELAJAR CRUD</h1> --}}
<div>
    <div class="card mb-4 pb-2">
        <h5 class="card-header" style="background: none">Risk Assesment</h5>
        <div class="card-body">
            <h5 class="card-title">Audit Type</h5>
            <div>
                <select id="id_staff_position" class="form-select" placeholder="Insert Kode Kegiatan" aria-label="Default select example">
                <option value="" disabled selected>Insert Audit Type</option>
                </select>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-2 justify-content-between">
                <span class="mt-1 fs-4">Data Jenis Staff</span>
                <a class="btn btn-primary  conva" href="{{ route('riskLevel.create') }}" >
                  Tambah Jenis Staff
                </a>                 
            </div>
            <table class="table" id="datatable">
                <thead>
                    <tr style="width: 100px" >
                        {{-- <th style="width: 100px">No</th> --}}
                        <th colspan="3" style="width: 100px">Nama</th>
                        <th colspan="1" style="width: 100px">Status</th>
                        <th colspan="1" style="width: 100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($modelRisk as $dataRisk)
                        <tr style="width: 100px" >
                            {{-- <th style="width: 100px">No</th> --}}
                            <td colspan="3" style="width: 100px">{{ $dataRisk->risk_level_name }}</td>
                            @if($dataRisk->modelRisk == '1')
                            <td colspan="1" style="width: 100px"><span class="badge" style=" width: 90px; border-radius: 4px; color:#50CDA3; background: #E8FFF3; box-shadow: -4px 4px 5px 0px #E8FFF3;">Active</span></td>
                            @else
                            <td colspan="1" style="width: 100px"><span class="badge" style=" width: 90px; border-radius: 4px; color:#F1416C; background: #FFF2F1; box-shadow: -4px 4px 5px 0px #FFF2F1;">In Active</span></td>
                            @endif
                            <td colspan="1" style="width: 100px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"  class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                    <g clip-path="url(#clip0_30_473)">
                                    <path d="M6 10C4.9 10 4 10.9 4 12C4 13.1 4.9 14 6 14C7.1 14 8 13.1 8 12C8 10.9 7.1 10 6 10ZM18 10C16.9 10 16 10.9 16 12C16 13.1 16.9 14 18 14C19.1 14 20 13.1 20 12C20 10.9 19.1 10 18 10ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z" fill="#313957"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_30_473">
                                    <rect width="24" height="24" fill="white"/>
                                    </clipPath>
                                    </defs>
                                    </svg>  
                                <ul class="dropdown-menu">
                                    <form action="{{ route('riskLevel.delete',$dataRisk->risk_level_id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <li><a class="dropdown-item conva-edit" href="{{ route('riskLevel.edit',$dataRisk->risk_level_id) }}" data-id="{{ $dataRisk->risk_level_id }}">Edit</a></li>
                                        <li><a class="dropdown-item delete-data" href="" data-id="{{ $dataRisk->risk_level_id }}">Delete</a></li>
                                    </form>
                                </ul>
                            </td>                       
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection