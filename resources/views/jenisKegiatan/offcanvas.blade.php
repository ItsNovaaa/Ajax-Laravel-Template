@include('jenisKegiatan.AddModalconfirm')
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExampleAdd" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Add Kegiatan</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
    {{-- <form action="{{ route('admin.store') }}" method="POST"> --}}
    {{-- @csrf --}}
      <div class="offcanvas-body mx-3">
        <div class="mb-4 row ">
          <span>Nama Kegiatan</span>
          <input class="form-control" type="text" name="nama_kegiatan" placeholder="Insert Nama Kegiatan" aria-label="default input example" id="nama_kegiatan">
        </div>
        <div class="mb-4 row ">
          <span>Kode Kegiatan</span>
          <input class="form-control" type="text" name="kode_kegiatan"  placeholder="Insert Kode Kegiatan" aria-label="default input example" id="kode_kegiatan">
        </div>
        <div class="mb-4 row  ">
            <span class="text-align-start">Insert Audite / Unit</span>      
            <select id="id_kegiatan_auditee" class="form-select" placeholder="Insert Kode Kegiatan" aria-label="Default select example">
              {{-- id di select --}}
            {{-- <option>Insert Auditee / Unit</option> --}}
            <option value="" disabled selected>Insert Audite / Unit</option>

              @foreach ($dataAuditee as $data)
                <option name="auditee" value="{{ $data->id_auditee }}">{{ $data->nama_auditee }}</option>
              @endforeach
            </select>      
        </div>
        <div class="mb-4 row ">
          <span class="mb-3">Kegiatan Status</span>
          <div class="d-flex justify-content-between">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="isaktif_kegiatan" id="isaktif_kegiatan" value="1">
                <label class="form-check-label" for="isaktif_kegiatan">
                  Active
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="isaktif_kegiatan" id="isaktif_kegiatan_non" value="0" style="border-radius: 18px;border: 1px solid #A3AED0;">
                <label class="form-check-label" for="isaktif_kegiatan">
                  Non Active
                </label>
              </div>
          </div>
        </div>
        <div class="mb-4 row justify-content-center">
          <button type="button" class="btn btn-primary confir w-full" style="border-radius: 13px;background: linear-gradient(90deg, #217AFF 0%, #7F2DE7 100%);">Tambah data</button>
        </div>
      </div>
  </div>
