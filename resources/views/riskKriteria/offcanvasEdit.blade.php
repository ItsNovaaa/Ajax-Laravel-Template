<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExampleEdit" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">Edit risk</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
        <div class="offcanvas-body mx-3">
            <input type="hidden" id="risk_id" value="">
          <div class="mb-4 row ">
            <span>Nama Audite</span>
            <input class="form-control" type="text" name="nama_risk" placeholder="Insert Nama risk" aria-label="default input example" id="nama_risk_edit">
          </div>
          <div class="mb-4 row ">
            <span>kode risk</span>
            <input class="form-control" type="text" name="kode_risk"  placeholder="Insert kode riske" aria-label="default input example" id="kode_risk_edit">
          </div>
          <div class="mb-4 row  ">
            <span class="text-align-start">Insert Audite / Unit</span>      
            <select id="level_risk_edit" class="form-select" placeholder="Insert kode kegiatane" aria-label="Default select example">
            {{-- <option value="" disabled selected>Insert Audite / Unit</option> --}}
                <option name="level_risk" value="1">High</option>
                <option name="level_risk" value="2">Medium</option>
                <option name="level_risk" value="3">Low</option>
            </select>      
          </div>
            <div class="mb-4 row ">
            <span class="mb-3">risk Status</span>
            <div class="d-flex justify-content-between">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="isaktif_risk" id="isaktif_risk" value="1">
                  <label class="form-check-label" for="isaktif_risk">
                    Active
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="isaktif_risk" id="isaktif_risk_non" value="0">
                  <label class="form-check-label" for="isaktif_risk">
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