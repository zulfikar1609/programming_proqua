<script>
$(document).ready(function() {
    $(document).on('click', '#btnSimpanDiagnosis', function() {
        var form = $('#formTambahDiagnosis')[0];

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
            url: "<?= base_url('/diagnosis/tambah') ?>",
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
                        $('#tambahModalDiagnosis').modal('hide');
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

$(document).on('click', '.btn-edit-diagnosis', function() {
    var id = $(this).data('id');
    var asesmenid = $(this).data('asesmenid');
    var diagnosa = $(this).data('diagnosa');
    var tindakan_penanganan = $(this).data('tindakan_penanganan');

    $('#editIdDiagnosis').val(id);
    $('#editAsesmenid').val(asesmenid);
    $('#editDiagnosa').val(diagnosa);
    $('#editTindakanpenanganan').val(tindakan_penanganan);
});

$(document).on('click', '#btnUpdateDiagnosis', function() {
    var form = $('#formEditDiagnosis')[0];

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
        url: "<?= base_url('/diagnosis/update') ?>", // route update
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
                    $('#editModalDiagnosis').modal('hide');
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

$(document).on('click', '.btn-delete-diagnosis', function(e) {
    e.preventDefault();
    var id = $(this).data('id');

    Swal.fire({
        title: 'Yakin ingin menghapus?',
        text: "Data diagnosis akan dihapus permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "<?= base_url('/diagnosis/hapus') ?>",
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
