<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Modules &rsaquo; DataTables &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url('stisla/dist/assets/modules/bootstrap/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('stisla/dist/assets/modules/fontawesome/css/all.min.css') ?>">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url('stisla/dist/assets/modules/datatables/datatables.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('stisla/dist/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('stisla/dist/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') ?>">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('stisla/dist/assets/css/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('stisla/dist/assets/css/components.css') ?>">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?= $this->include('template/navbar') ?>
      <?= $this->include('template/sidebar') ?>

      <!-- Main Content -->
      <div class="main-content" id="main-content">
        <?= $this->renderSection('content') ?>
      </div>
      <?= $this->include('template/footer') ?>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url('stisla/dist/assets/modules/jquery.min.js') ?>"></script>
  <script src="<?= base_url('stisla/dist/assets/modules/popper.js') ?>"></script>
  <script src="<?= base_url('stisla/dist/assets/modules/tooltip.js') ?>"></script>
  <script src="<?= base_url('stisla/dist/assets/modules/bootstrap/js/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('stisla/dist/assets/modules/nicescroll/jquery.nicescroll.min.js') ?>"></script>
  <script src="<?= base_url('stisla/dist/assets/modules/moment.min.js') ?>"></script>
  <script src="<?= base_url('stisla/dist/assets/js/stisla.js') ?>"></script>
  
  <!-- JS Libraies -->
  <script src="<?= base_url('stisla/dist/assets/modules/datatables/datatables.min.js') ?>"></script>
  <script src="<?= base_url('stisla/dist/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') ?>"></script>
  <script src="<?= base_url('stisla/dist/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') ?>"></script>
  <script src="<?= base_url('stisla/dist/assets/modules/jquery-ui/jquery-ui.min.js') ?>"></script>
  <script src="<?= base_url('stisla/dist/assets/modules/prism/prism.js') ?>"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url('stisla/dist/assets/js/page/modules-datatables.js') ?>"></script>
  <script src="<?= base_url('stisla/dist/assets/js/page/bootstrap-modal.js') ?>"></script>
  
  <!-- Template JS File -->
  <script src="<?= base_url('stisla/dist/assets/js/scripts.js') ?>"></script>
  <script src="<?= base_url('stisla/dist/assets/js/custom.js') ?>"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
  // Fungsi Re-init semua plugin setelah AJAX load
  function reinitPlugins() {
      // Re-init DataTable
      if ($('#table-1').length) {
          $('#table-1').DataTable();
      }
  }

  // EVENT KLIK MENU
  $(document).on("click", ".ajax-link", function(e) {
      e.preventDefault();

      let url = $(this).attr("href");

      // Spinner
      $("#main-content").html(
          '<div class="text-center p-5"><div class="spinner-border"></div></div>'
      );

      // Update URL tanpa reload
      history.pushState(null, null, url);

      // Update menu aktif
      $(".sidebar-menu li").removeClass("active");
      $(this).closest("li").addClass("active");

      // Load konten halaman + re-init plugin
      $("#main-content").load(url + " #main-content > *", function() {
          reinitPlugins();
      });
  });

  // EVENT TEKAN BACK/FORWARD BROWSER
  window.onpopstate = function () {
      let url = location.href;

      $("#main-content").load(url + " #main-content > *", function() {
          reinitPlugins();
      });

      // Update sidebar otomatis
      $(".sidebar-menu li").removeClass("active");
      $('.sidebar-menu a[href="' + url + '"]').closest("li").addClass("active");
  };
  </script>

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




</body>
</html>