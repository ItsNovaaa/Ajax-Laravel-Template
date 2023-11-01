<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExampleEdit" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">Edit Position</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
        <div class="offcanvas-body mx-3">
            <input type="hidden" id="position_id" value="">
          <div class="mb-4 row ">
            <span>Nama Audite</span>
            <input class="form-control" type="text" name="nama_position" placeholder="Insert Nama Position" aria-label="default input example" id="nama_position_edit">
          </div>
          <div class="mb-4 row ">
            <span>Kode Position</span>
            <input class="form-control" type="text" name="kode_position"  placeholder="Insert Kode Position" aria-label="default input example" id="kode_position_edit">
          </div>
          <div class="mb-4 row ">
            <span>Deskripsi Position</span>
            <input class="form-control" type="text" name="deskripsi_position"  placeholder="Insert Deskripsi Position" aria-label="default input example" id="deskripsi_position_edit">
          </div>
          <div class="mb-4 row ">
            <span class="mb-3">Position Status</span>
            <div class="d-flex justify-content-between">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="isaktif_position" id="isaktif_position" value="1">
                  <label class="form-check-label" for="isaktif_position">
                    Active
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="isaktif_position" id="isaktif_position_non" value="0">
                  <label class="form-check-label" for="isaktif_position">
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
