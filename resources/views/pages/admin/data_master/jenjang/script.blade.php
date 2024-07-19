<script>
    $(document).ready(function() {
        var table = $('#jenjang-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('dashboard.jenjang.index') !!}",
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
                    data: 'jenjang_nama',
                    name: 'jenjang_nama'
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
            $.get("{{ route('dashboard.jenjang.index') }}" + '/' + id + '/edit', function(data) {
                $('#savedata').val("edit");
                $('#ajaxModel').modal('show');
                $('#jenjang_id').val(data.jenjang_id);
                $('#jenjang_nama').val(data.jenjang_nama);
                $('#title').text('Edit Jenjang');
            })
        });


        $('.add-modal').click(function() {
            $('#savedata').val("add");
            $('#jenjang_id').val('');
            $('#form').trigger("reset");
            $('#title').text('Tambah Jenjang');
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
                url: "{{ route('dashboard.jenjang.store') }}",
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
                        url: "{{ route('dashboard.jenjang.destroy', '') }}" + '/' + id,
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
