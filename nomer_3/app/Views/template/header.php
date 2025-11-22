<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?=$title ?></title>

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

          $.get(url, function(res) {
              let newTitle = $(res).filter("title").text();
              if (newTitle) {
                  document.title = newTitle;
              }
          });

      });
  });

  // EVENT TEKAN BACK/FORWARD BROWSER
  window.onpopstate = function () {
      let url = location.href;

      $("#main-content").load(url + " #main-content > *", function() {
          reinitPlugins();

          $.get(url, function(res) {
              let newTitle = $(res).filter("title").text();
              if (newTitle) {
                  document.title = newTitle;
              }
          });

      });

      // Update sidebar otomatis
      $(".sidebar-menu li").removeClass("active");
      $('.sidebar-menu a[href="' + url + '"]').closest("li").addClass("active");
  };
  </script>

  <?= $this->include('scripts/pasienscript') ?>
  <?= $this->include('scripts/pendaftaranscript') ?>
  <?= $this->include('scripts/kunjunganscript') ?>
  <?= $this->include('scripts/asesmenscript') ?>
  <?= $this->include('scripts/diagnosisscript') ?>




</body>
</html>