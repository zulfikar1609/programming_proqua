<script>
$(document).ready(function() {
    $(document).on('click', '#btnSimpan', function() {
        var form = $('#formTambah')[0];

        if (!form.checkValidity()) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Semua field wajib diisi!'
            });
            return;
        }

        var formData = new FormData(form);

        $.ajax({
            url: "<?= base_url('/pasien/tambah') ?>",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function(response) {
                if(response.status === 'success'){
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: response.message
                    }).then(() => {
                        $('#tambahModal').modal('hide');
                        form.reset();
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message
                    });
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Terjadi kesalahan server.'
                });
            }
        });
    });
});

$(document).on('click', '.btn-edit', function() {
    var id = $(this).data('id');
    var nama = $(this).data('nama');
    var norm = $(this).data('norm');
    var alamat = $(this).data('alamat');

    $('#editId').val(id);
    $('#editNama').val(nama);
    $('#editNorm').val(norm);
    $('#editAlamat').val(alamat);
});

$(document).on('click', '#btnUpdate', function() {
    var form = $('#formEdit')[0];

    if (!form.checkValidity()) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Semua field wajib diisi!'
        });
        return;
    }

    var formData = new FormData(form);

    $.ajax({
        url: "<?= base_url('/pasien/update') ?>", // route update
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function(response) {
            if(response.status === 'success'){
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: response.message
                }).then(() => {
                    $('#editModal').modal('hide');
                    form.reset();
                    location.reload(); // atau reload DataTable
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: response.message
                });
            }
        },
        error: function(xhr) {
            console.log(xhr.responseText);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Terjadi kesalahan server.'
            });
        }
    });
});

$(document).on('click', '.btn-delete', function(e) {
    e.preventDefault();
    var id = $(this).data('id');

    Swal.fire({
        title: 'Yakin ingin menghapus?',
        text: "Data pasien akan dihapus permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "<?= base_url('/pasien/hapus') ?>",
                type: "POST",
                data: { id: id },
                dataType: "json",
                success: function(response) {
                    if(response.status === 'success'){
                        Swal.fire({
                            icon: 'success',
                            title: 'Terhapus',
                            text: response.message
                        }).then(() => {
                            location.reload(); // atau reload DataTable
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message
                        });
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Terjadi kesalahan server.'
                    });
                }
            });
        }
    });
});

$(document).ready(function() {
    $('#btnImportDummy').click(function() {
        Swal.fire({
            title: 'Apakah yakin?',
            text: "Data dummy pasien akan diimport!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, import!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= base_url('/pasien/import-dummy') ?>",
                    type: "GET",
                    success: function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Dummy data pasien telah diimport.'
                        }).then(() => {
                            location.reload(); // reload halaman untuk lihat data
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Terjadi kesalahan saat import.'
                        });
                    }
                });
            }
        });
    });
});
</script>
