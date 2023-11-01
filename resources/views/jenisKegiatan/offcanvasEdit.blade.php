<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExampleEdit" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">Edit Kegiatan</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
        <div class="offcanvas-body mx-3">
            <input type="hidden" id="kegiatan_id" value="">
          <div class="mb-4 row ">
            <span>Nama Audite</span>
            <input class="form-control" type="text" name="nama_kegiatan" placeholder="Insert Nama Kegiatan" aria-label="default input example" id="nama_kegiatan_edit">
          </div>
          <div class="mb-4 row ">
            <span>Kode Kegiatan</span>
            <input class="form-control" type="text" name="kode_kegiatan"  placeholder="Insert Kode Kegiatan" aria-label="default input example" id="kode_kegiatan_edit">
          </div>
          <div class="mb-4 row  ">
            <span class="text-align-start">Insert Audite / Unit</span>      
            <select id="id_kegiatan_auditee_edit" class="form-select" aria-label="Default select example">
              <span>Insert Auditee / Unit</span>
              @foreach ($dataAuditee as $data)
              {{-- id="id_kegiatan_auditee_edit --}}
                <option value="{{ $data->id_auditee }}">{{ $data->nama_auditee }}</option>
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
                  <input class="form-check-input" type="radio" name="isaktif_kegiatan" id="isaktif_kegiatan_non" value="0">
                  <label class="form-check-label" for="isaktif_kegiatan">
                    Non Active
                  </label>
                </div>
            </div>
          </div>
          <div class="mb-4 row justify-content-center">
            <button type="button" class="btn btn-primary confir-edit w-full">Tambah data</button>
          </div>
            {{-- </form>
        </form> --}}
        </div>
    </div>
