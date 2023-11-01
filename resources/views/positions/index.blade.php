@extends('layouts.main')
@include('positions.offcanvas')
@include('positions.offcanvasEdit')
@section('content')
{{-- <h1 class="text-center mb-5">BELAJAR CRUD</h1> --}}
<div class="card">
    <div class="card-body">
        <table class="table" id="datatable">
            <thead>
                <div class="d-flex mb-2 justify-content-between">
                    <span class="mt-1 fs-4">Data Jenis Position</span>
                    <a class="btn btn-primary  conva" >
                      Tambah Jenis Position
                    </a>                 
                </div>
                <tr style="width: 100px">
                    {{-- <th style="width: 100px">No</th> --}}
                    <th style="width: 100px">Nama</th>
                    <th style="width: 100px">Deskripsi Position</th>
                    <th style="width: 100px">Kode position</th>
                    <th style="width: 100px">Status</th>
                    <th style="width: 100px">Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection
@push('scripts')
        <script>
          var dataTable;
          $(function() {
            dataTable = $('#datatable').dataTable({
                // contentType: "application/json; charset=utf-8",
                processing: true,
                serverside: true,
                // scrollY: false,
                ajax: "{{ route('position.Datatable') }}",
                columns: [
                //   {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'nama_position', name: 'Nama'},
                  {data: 'deskripsi_position', name: 'Nama'},
                  {data: 'kode_position', name: 'position'},
                  {
                        data: "isaktif_position",
                        render: function (data) {
                            if (data === '1' ) {
                                return '<span class="badge" style=" width: 90px; border-radius: 4px; color:#50CDA3; background: #E8FFF3; box-shadow: -4px 4px 5px 0px #E8FFF3;">Active</span>';
                            } else {
                                return '<span class="badge" style=" width: 90px; border-radius: 4px; color:#F1416C; background: #FFF2F1; box-shadow: -4px 4px 5px 0px #FFF2F1;">In Active</span>';
                            }
                        }
                    },
                  {data: 'action', name: 'aksi'},
                //   {data: '_', searchable: false, orderable: false, class: 'text-center'},

              ]
              });
          });

          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

        $('body').on('click','.conva', function(e){
            e.preventDefault();
            $('#offcanvasExampleAdd').offcanvas('show');
            $('.confir').click(function() {
            Swal.fire({
            title: 'Apakah Anda yakin ingin menyimpan data?',
            text: 'Data yang telah disimpan tidak dapat diubah kembali.',
            icon: 'warning',
            showCancelButton: true,
            width: 500,
            confirmButtonColor: '#217AFF',
            // confirmTextButtonColor: '#B9D5FF',
            cancelButtonColor: '#F1416C',
            confirmButtonText: 'Ya, simpan',
            cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Simpan data
                        $.ajax({
                            url:'{{ route('position.store') }}',
                            type:'POST',
                            data: {
                                nama_position: $('#nama_position').val(),
                                kode_position: $('#kode_position').val(),
                                deskripsi_position: $('#deskripsi_position').val(),
                                isaktif_position: $('input[name="isaktif_position"]:checked').val(),
                            },
                            success: function(response) {
                                if (response.errors) {
                                    console.log(response.errors);
                                    // Tampilkan pesan error
                                    Swal.fire({
                                        title: 'Error',
                                        text: (response.message),
                                        icon: 'error',
                                        // customClass: { icon: 'no-border' },
                                        timer: 1500

                                    });
                                } else {
                                    // Refresh datatable
                                    $('#datatable').DataTable().ajax.reload();

                                    // Tampilkan pesan sukses
                                    Swal.fire({
                                        title: 'Sukses',
                                        text: 'Data berhasil disimpan.',
                                        icon: 'success',
                                        timer:1500
                                    });
                                    $('#nama_position').val(''); // Clear the value
                                    $('#kode_position').val(''); // Clear the value
                                    $('#id_position_auditee').val(''); // Clear the value
                                    $('#isaktif_position').val(''); // Clear the value
                                }
                            }
                        });
                    }
                });

            });
        });
        $('body').on('click', '.conva-edit', function (e) {
            e.preventDefault();
            var id_position = $(this).data('id');
            var selectedValue = $('#id_position').val();
            $('#position_id').val(id_position);
            $(document).data('id_position', id_position); // Store 'id_position' in document level data
            $.ajax({
                url: "{{ route('position.edit') }}/" + id_position,
                type: 'GET',
                success: function (response) {
                    $('#offcanvasExampleEdit').offcanvas('show');
                    $('#nama_position_edit').val(response.result.nama_position);
                    $('#kode_position_edit').val(response.result.kode_position);
                    $('#deskripsi_position_edit').val(response.result.deskripsi_position);
                    // $('option[name="audite"][value="'+ selectedValue +'"]').val(response.result.id_position_auditee).prop('selected',true);
                    $('input[name="isaktif_position"][value=""]').val(response.result.isaktif_position);
                    if (isaktif_position === 1) {
                    $('input[name="isaktif_position"][value="1"]').prop('checked', true);
                } else {
                    $('input[name="isaktif_position"][value="0"]').prop('checked', true);
                }
                }
            });
        });
        
        $(document).on('click', '.delete-data', function (e) {
    e.preventDefault();
    var id_position = $(this).data('id');
    // var id_position = $('#auditee_id').val();

    console.log(id_position);
    Swal.fire({
        title: 'Apakah Anda yakin ingin hapus data?',
        text: 'Data yang telah disimpan tidak dapat diubah kembali.',
        icon: 'warning',
        showCancelButton: true,
        width: 500,
        confirmButtonColor: '#217AFF',
        cancelButtonColor: '#F1416C',
        customClass: { icon: 'no-border' },
        confirmButtonText: 'Ya, hapus',
        cancelButtonText: 'Batal',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "DELETE",
                url: "{{ route('position.delete') }}/" + id_position,
                success: function (response) {
                    if (response.errors) {
                        console.log(response.errors);
                        // Tampilkan pesan error
                        Swal.fire({
                            title: 'Error',
                            text: response.message,
                            icon: 'error',
                            timer: 1500
                        });
                    } else {
                        // Refresh datatable
                        $('#datatable').DataTable().ajax.reload();

                        // Tampilkan pesan sukses
                        Swal.fire({
                            title: 'Sukses',
                            text: 'Data berhasil dihapus.',
                            icon: 'success',
                            timer: 1500
                        });
                    }
                },
            });
        }
    });
});

        $(document).on('click', '.confir-edit', function (e) {
            e.preventDefault();
            var id_position = $('#position_id').val();

            // var id_position = $(document).data('id_position'); // Retrieve the stored 'id_position'
            console.log(id_position);
            Swal.fire({
                title: 'Apakah Anda yakin ingin menyimpan data?',
                text: 'Data yang telah disimpan tidak dapat diubah kembali.',
                icon: 'warning',
                showCancelButton: true,
                width: 500,
                confirmButtonColor: '#217AFF',
                cancelButtonColor: '#F1416C',
                customClass: { icon: 'no-border' },
                confirmButtonText: 'Ya, simpan',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    var data = {
                        nama_position: $('#nama_position_edit').val(),
                        kode_position: $('#kode_position_edit').val(),
                        deskripsi_position: $('#deskripsi_position_edit').val(),
                        isaktif_position: $('input[name="isaktif_position"]:checked').val()
                    };

                    $.ajax({
                        type: "PUT",
                        url: "{{ route('position.update') }}/" + id_position,
                        data: data,
                        success: function (response) {
                            if (response.errors) {
                                console.log(response.errors);
                                // Tampilkan pesan error
                                Swal.fire({
                                    title: 'Error',
                                    text: response.message,
                                    icon: 'error',
                                    // customClass: { icon: 'no-border' },
                                    timer: 1500
                                });
                            } else {
                                // Refresh datatable
                                $('#datatable').DataTable().ajax.reload();

                                // Tampilkan pesan sukses
                                Swal.fire({
                                    title: 'Sukses',
                                    text: 'Data berhasil disimpan.',
                                    icon: 'success',
                                    timer: 1500
                                });
                            }
                        }
                    });
                }
            });
    });
// });
        </script>
@endpush
