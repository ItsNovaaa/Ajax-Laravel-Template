@extends('layouts.main')
@include('admin.offcanvas')
@include('admin.offcanvasEdit')
@section('content')
{{-- <h1 class="text-center mb-5">BELAJAR CRUD</h1> --}}
<div class="card">
    <div class="card-body">
        <table class="table" id="datatable">
            <thead>
                <div class="d-flex mb-2 justify-content-between">
                    <span class="mt-1 fs-4">Data Staff</span>
                    <a class="btn btn-primary mx-lg-4 conva" >
                      Tambah
                    </a>                 
                </div>
                <tr style="width: 100px">
                    {{-- <th style="width: 100px">No</th> --}}
                    <th style="width: 100px">Nama</th>
                    <th style="width: 100px">Auditee / Unit</th>
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
                ajax: "{{ route('admin.Datatable') }}" ,
                columns: [
                //   {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'nama_auditee', name: 'Nama'},
                  {data: 'kode_auditee', name: 'Auditee'},
                  {
                        data: "isaktif_auditee",
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
                            url:'{{ route('admin.store') }}',
                            type:'POST',
                            data: {
                                nama_auditee: $('#nama_auditee').val(),
                                kode_auditee: $('#kode_auditee').val(),
                                isaktif_auditee: $('input[name="isaktif_auditee"]:checked').val(),
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
                                    $('#nama_auditee').val(''); // Clear the value
                                    $('#kode_auditee').val(''); // Clear the value
                                    $('#isaktif_auditee').val(''); // Clear the value
                                }
                            }
                        });
                    }
                });

            });
        });
        $('body').on('click', '.conva-edit', function (e) {
            e.preventDefault();
            var id_auditee = $(this).data('id');
            $('#auditee_id').val(id_auditee);
            $(document).data('id_auditee', id_auditee); // Store 'id_auditee' in document level data
            $.ajax({
                url: "{{ route('admin.edit') }}/" + id_auditee,
                type: 'GET',
                success: function (response) {
                    $('#offcanvasExampleEdit').offcanvas('show');
                    $('#nama_auditee_edit').val(response.result.nama_auditee);
                    $('#kode_auditee_edit').val(response.result.kode_auditee);
                    $('input[name="isaktif_auditee"][value="1"]').val(response.result.isaktif_auditee);
                    if (isaktif_auditee === 1) {
                    $('input[name="isaktif_auditee"][value="1"]').prop('checked', true);
                } else {
                    $('input[name="isaktif_auditee"][value="0"]').prop('checked', true);
                }
                }
            });
        });
        
        $(document).on('click', '.delete-data', function (e) {
    e.preventDefault();
    var id_auditee = $(this).data('id');
    // var id_auditee = $('#auditee_id').val();

    console.log(id_auditee);
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
                url: "{{ route('admin.delete') }}/" + id_auditee,
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
            var id_auditee = $('#auditee_id').val();

            // var id_auditee = $(document).data('id_auditee'); // Retrieve the stored 'id_auditee'
            console.log(id_auditee);
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
                        nama_auditee: $('#nama_auditee_edit').val(),
                        kode_auditee: $('#kode_auditee_edit').val(),
                        isaktif_auditee: $('input[name="isaktif_auditee"]:checked').val()
                    };

                    $.ajax({
                        type: "PUT",
                        url: "{{ route('admin.update') }}/" + id_auditee,
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