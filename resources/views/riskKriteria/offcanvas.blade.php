<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExampleAdd" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Add Risk</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
    {{-- <form action="{{ route('admin.store') }}" method="POST"> --}}
    {{-- @csrf --}}
      <div class="offcanvas-body mx-3">
        <div class="mb-4 row ">
          <span>Nama Risk</span>
          <input class="form-control" type="text" name="nama_risk" placeholder="Insert Nama Risk" aria-label="default input example" id="nama_risk">
        </div>
        <div class="mb-4 row ">
          <span>Kode Risk</span>
          <input class="form-control" type="text" name="kode_risk"  placeholder="Insert kode Risk" aria-label="default input example" id="kode_risk">
        </div>
        <div class="mb-4 row  ">
          <span class="text-align-start">Insert Audite / Unit</span>      
          <select id="level_risk" class="form-select" placeholder="Insert Kode Kegiatan" aria-label="Default select example">
          <option value="" disabled selected>Insert Audite / Unit</option>
              <option name="auditee" value="1">High</option>
              <option name="auditee" value="2">Medium</option>
              <option name="auditee" value="3">Low</option>
          </select>      
        </div>
        <div class="mb-4 row ">
          <span class="mb-3">Risk Status</span>
          <div class="d-flex justify-content-between">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="isaktif_risk" id="isaktif_risk" value="1">
                <label class="form-check-label" for="isaktif_risk">
                  Active
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="isaktif_risk" id="isaktif_risk_non" value="0" style="border-radius: 18px;border: 1px solid #A3AED0;">
                <label class="form-check-label" for="isaktif_risk">
                  Non Active
                </label>
              </div>
          </div>
        </div>
        <div class="mb-4 row justify-content-center">
          <button type="button" class="btn btn-primary confir w-full" style="border-radius: 13px;background: linear-gradient(90deg, #217AFF 0%, #7F2DE7 100%);">Save Data</button>
        </div>
      </div>
  </div>
