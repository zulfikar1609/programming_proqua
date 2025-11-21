<script>
$(document).ready(function() {
    $(document).on('click', '#btnSimpanKunjungan', function() {
        var form = $('#formTambahKunjungan')[0];

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
            url: "<?= base_url('/kunjungan/tambah') ?>",
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
                        $('#tambahModalKunjungan').modal('hide');
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

$(document).on('click', '.btn-edit-kunjungan', function() {
    var id = $(this).data('id');
    var pendaftaranpasienid = $(this).data('pendaftaranpasienid');
    var jenis_kunjungan = $(this).data('jenis_kunjungan');
    var tglkunjungan = $(this).data('tglkunjungan');

    $('#editIdKunjungan').val(id);
    $('#editPendaftaranpasienid').val(pendaftaranpasienid);
    $('#editJeniskunjungan').val(jenis_kunjungan);
    $('#editTglkunjungan').val(tglkunjungan);
});

$(document).on('click', '#btnUpdateKunjungan', function() {
    var form = $('#formEditKunjungan')[0];

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
        url: "<?= base_url('/kunjungan/update') ?>", // route update
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
                    $('#editModalKunjungan').modal('hide');
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

$(document).on('click', '.btn-delete-kunjungan', function(e) {
    e.preventDefault();
    var id = $(this).data('id');

    Swal.fire({
        title: 'Yakin ingin menghapus?',
        text: "Data kunjungan akan dihapus permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "<?= base_url('/kunjungan/hapus') ?>",
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

</script>
