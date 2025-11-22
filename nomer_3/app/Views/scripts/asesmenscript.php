<script>
$(document).ready(function() {
    $(document).on('click', '#btnSimpanAsesmen', function() {
        var form = $('#formTambahAsesmen')[0];

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
            url: "<?= base_url('/asesmen/tambah') ?>",
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
                        $('#tambahModalAsesmen').modal('hide');
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

$(document).on('click', '.btn-edit-asesmen', function() {
    var id = $(this).data('id');
    var kunjunganid = $(this).data('kunjunganid');
    var keluhan_utama = $(this).data('keluhan_utama');
    var keluhan_tambahan = $(this).data('keluhan_tambahan');

    $('#editIdAsesmen').val(id);
    $('#editKunjunganid').val(kunjunganid);
    $('#editKeluhanutama').val(keluhan_utama);
    $('#editKeluhantambahan').val(keluhan_tambahan);
});

$(document).on('click', '#btnUpdateAsesmen', function() {
    var form = $('#formEditAsesmen')[0];

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
        url: "<?= base_url('/asesmen/update') ?>", // route update
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
                    $('#editModalAsesmen').modal('hide');
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

$(document).on('click', '.btn-delete-asesmen', function(e) {
    e.preventDefault();
    var id = $(this).data('id');

    Swal.fire({
        title: 'Yakin ingin menghapus?',
        text: "Data asesmen akan dihapus permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "<?= base_url('/asesmen/hapus') ?>",
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
