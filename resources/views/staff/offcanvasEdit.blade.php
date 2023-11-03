<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExampleEdit" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">Edit staff</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
        <div class="offcanvas-body mx-3">
            <input type="hidden" id="staff_id" value="">
          <div class="mb-4 row ">
            <span>Nama Staff</span>
            <input class="form-control" type="text" name="nama_staff" placeholder="Insert Nama staff" aria-label="default input example" id="nama_staff_edit">
          </div>
          <div class="mb-4 row ">
            <span>Username</span>
            <input class="form-control" type="text" name="username_staff"  placeholder="Insert username_staff" aria-label="default input example" id="username_staff_edit">
          </div>
          <div class="mb-4 row ">
            <span>No.Hp</span>
            <input class="form-control" type="text" name="nomor_staff"  placeholder="Insert nomor" aria-label="default input example" id="nomor_staff_edit">
          </div>
          <div class="mb-4 row  ">
            <span class="text-align-start">Audit / Unit</span>      
            <select id="id_staff_auditee_edit" class="form-select" placeholder="Insert kode kegiatane" aria-label="Default select example">
              {{-- id di select --}}
            {{-- <option>Insert Auditee / Unit</option> --}}
            {{-- <option value="" disabled selected>Insert Audite / Unit</option> --}}
  
              @foreach ($dataStaff as $data)
                <option name="auditee" value="{{ $data->id_auditee }}">{{ $data->nama_auditee }}</option>
              @endforeach
            </select>      
          </div>
          <div class="mb-4 row  ">
            <span class="text-align-start">Position</span>      
            <select id="id_staff_position_edit" class="form-select" placeholder="Insert kode kegiatane" aria-label="Default select example">
              {{-- id di select --}}
            {{-- <option>Insert Auditee / Unit</option> --}}
            {{-- <option value="" disabled selected>Insert Position</option> --}}
  
            @foreach ($dataposition as $datapositions)
            <option name="auditee" value="{{ $datapositions->id_position }}">{{ $datapositions->nama_position }}</option>
          @endforeach
            </select>      
          </div>
            <div class="mb-4 row ">
            <span class="mb-3">Staff Status</span>
            <div class="d-flex justify-content-between">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="isaktif_staff" id="isaktif_staff" value="1">
                  <label class="form-check-label" for="isaktif_staff">
                    Active
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="isaktif_staff" id="isaktif_staff_non" value="0">
                  <label class="form-check-label" for="isaktif_staff">
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