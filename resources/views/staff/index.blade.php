@extends('layouts.main')
@include('staff.offcanvas')
@include('staff.offcanvasEdit')
@section('content')
{{-- <h1 class="text-center mb-5">BELAJAR CRUD</h1> --}}
<div class="card">
    <div class="card-body">
        <table class="table" id="datatable">
            <thead>
                <div class="d-flex mb-2 justify-content-between">
                    <span class="mt-1 fs-4">Data Jenis staff</span>
                    <a class="btn btn-primary  conva" >
                      Tambah Jenis staff
                    </a>                 
                </div>
                <tr style="width: 100px">
                    {{-- <th style="width: 100px">No</th> --}}
                    <th style="width: 100px">Nama</th>
                    <th style="width: 100px">deskripsi staff</th>
                    <th style="width: 100px">Level staff</th>
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
                ajax: "{{ route('staff.Datatable') }}",
                columns: [
                //   {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'nama_staff', name: 'Nama'},
                  {data: 'id_staff_auditee', name: 'id_auditee'},
                  {data: 'nomor_staff', name: 'nomor'},
                  {
                        data: "isaktif_staff",
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
                            url:'{{ route('staff.store') }}',
                            type:'POST',
                            data: {
                                nama_staff: $('#nama_staff').val(),
                                username_staff: $('#username_staff').val(),
                                nomor_staff: $('#nomor_staff').val(),
                                id_staff_auditee: $('#id_staff_auditee').val(),
                                id_staff_position: $('#id_staff_position').val(),
                                isaktif_staff: $('input[name="isaktif_staff"]:checked').val(),
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
                                    $('#nama_staff').val(''); // Clear the value
                                    $('#kode_staff').val(''); // Clear the value
                                    $('#level_staff').val(''); // Clear the value
                                    $('#isaktif_staff').val(''); // Clear the value
                                }
                            }
                        });
                    }
                });

            });
        });
        $('body').on('click', '.conva-edit', function (e) {
            e.preventDefault();
            var id_staff = $(this).data('id');
            var selectedValue = $('#id_staff').val();
            $('#staff_id').val(id_staff);
            $(document).data('id_staff', id_staff); // Store 'id_staff' in document level data
            $.ajax({
                url: "{{ route('staff.edit') }}/" + id_staff,
                type: 'GET',
                success: function (response) {
                    $('#offcanvasExampleEdit').offcanvas('show');
                    $('#nama_staff_edit').val(response.result.nama_staff);
                    $('#username_staff_edit').val(response.result.username_staff);
                    $('#nomor_staff_edit').val(response.result.nomor_staff);
                    $('#id_staff_auditee_edit').val(response.result.id_staff_auditee);
                    $('#id_staff_position_edit').val(response.result.id_staff_position);
                    $('input[name="isaktif_staff"][value=""]').val(response.result.isaktif_staff);
                    if (isaktif_staff === 1) {
                    $('input[name="isaktif_staff"][value="1"]').prop('checked', true);
                } else {
                    $('input[name="isaktif_staff"][value="0"]').prop('checked', true);
                }
                }
            });
        });
        
        $(document).on('click', '.delete-data', function (e) {
    e.preventDefault();
    var id_staff = $(this).data('id');
    // var id_staff = $('#auditee_id').val();

    console.log(id_staff);
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
                url: "{{ route('staff.delete') }}/" + id_staff,
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
            var id_staff = $('#staff_id').val();

            // var id_staff = $(document).data('id_staff'); // Retrieve the stored 'id_staff'
            console.log(id_staff);
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
                        nama_staff: $('#nama_staff_edit').val(),
                        username_staff: $('#username_staff_edit').val(),
                        nomor_staff: $('#nomor_staff_edit').val(),
                        id_staff_auditee: $('#id_staff_auditee_edit').val(),
                        id_staff_position: $('#id_staff_position_edit').val(),
                        isaktif_staff: $('input[name="isaktif_staff"]:checked').val()
                    };

                    $.ajax({
                        type: "PUT",
                        url: "{{ route('staff.update') }}/" + id_staff,
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