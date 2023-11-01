<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExampleEdit" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">Edit Auditee</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
        <div class="offcanvas-body mx-3">
            <input type="hidden" id="auditee_id" value="">
          <div class="mb-4 row ">
            <span>Nama Audite</span>
            <input class="form-control" type="text" name="nama_auditee" placeholder="Insert Nama Auditee" aria-label="default input example" id="nama_auditee_edit">
          </div>
          <div class="mb-4 row ">
            <span>Kode Auditee</span>
            <input class="form-control" type="text" name="kode_auditee"  placeholder="Insert Kode Auditee" aria-label="default input example" id="kode_auditee_edit">
          </div>
          <div class="mb-4 row ">
            <span class="mb-3">Auditee Status</span>
            <div class="d-flex justify-content-between">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="isaktif_auditee" id="isaktif_auditee" value="1">
                  <label class="form-check-label" for="isaktif_auditee">
                    Active
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="isaktif_auditee" id="isaktif_auditee_non" value="0">
                  <label class="form-check-label" for="isaktif_auditee">
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
