<script>
    $(document).ready(function() {
        var table = $('#prodi-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('dashboard.prodi.index') !!}',
            columns: [{
                    data: null,
                    class: "align-top",
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'prodi_kode',
                    name: 'prodi_kode'
                },
                {
                    data: 'prodi_nama',
                    name: 'prodi_nama'
                },
                {
                    data: 'fakultas_nama',
                    name: 'fakultas_nama'
                },
                {
                    data: 'jenjang_nama',
                    name: 'jenjang_nama'
                },
                {
                    data: 'kelas_nama',
                    name: 'kelas_nama'
                },
                {
                    data: 'prodi_status',
                    name: 'prodi_status'
                },

                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });


        $('body').on('click', '.edit-modal', function() {
            var id = $(this).data('id');
            $('#savedata').html('Simpan');
            $('.alert-danger').addClass('d-none');
            $.get("{{ route('dashboard.prodi.index') }}" + '/' + id + '/edit', function(data) {
                $('#savedata').val("edit");
                $('#ajaxModel').modal('show');
                $('#prodi_id').val(data.prodi_id);
                $('#prodi_kode').val(data.prodi_kode);
                $('#prodi_nama').val(data.prodi_nama);
                $('#fakultas_kode').val(data.fakultas_kode);
                $('#jenjang_nama').val(data.jenjang_nama);
                $('#kelas_kode').val(data.kelas_kode);
                $('#prodi_status').val(data.prodi_status);
                $('#title').text('Edit Prodi');
            })
        });


        $('.add-modal').click(function() {
            $('#savedata').val("add");
            $('#prodi_id').val('');
            $('#form').trigger("reset");
            $('#title').text('Tambah Prodi');
            $('#ajaxModel').modal('show');
        });

        $('#form').keydown(function(e) {
            if (e.key === "Enter") {
                e.preventDefault();
                $('#savedata').click();
            }
        });


        $('#savedata').click(function(e) {
            e.preventDefault(); // Menonaktifkan perilaku default dari tombol

            $(this).html('Mengirim..');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                data: $('#form').serialize(),
                url: "{{ route('dashboard.prodi.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    swal.fire("Done!", data.success, "success");
                    $('#form').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();
                },
                error: function(data) {
                    // Tampilkan pesan validasi dari respons JSON
                    if (data.responseJSON && data.responseJSON.errors) {
                        $('.alert-danger').removeClass('d-none');
                        $('.alert-danger').html("<ul>");

                        $.each(data.responseJSON.errors, function(key, value) {
                            $('.alert-danger').find('ul').append("<li>" + value +
                                "</li>");
                        });
                        $('.alert-danger').append("</ul>");
                    } else {
                        console.log('Error:', data);
                    }
                    $('#savedata').html('Simpan');
                }
            });
        });




        $('body').on('click', '.delete', function() {
            var id = $(this).data("id");
            swal.fire({
                title: "Hapus?",
                icon: 'Pertanyaan',
                text: "Harap pastikan dan kemudian konfirmasi!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Ya, hapus saja!",
                cancelButtonText: "Tidak, batal!",
                reverseButtons: !0
            }).then(function(e) {
                if (e.value === true) {

                    $.ajax({
                        type: "DELETE",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ route('dashboard.prodi.destroy', '') }}" + '/' + id,
                        success: function(data) {
                            table.draw();
                            swal.fire("Done!", data.message, "success");

                        },
                        error: function(data) {
                            console.log('Error:', data);
                        }
                    });
                }

            });
        });
    });
</script>
