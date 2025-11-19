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
      <?= $this->renderSection('content') ?>
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

  <!-- Page Specific JS File -->
  <script src="<?= base_url('stisla/dist/assets/js/page/modules-datatables.js') ?>"></script>
  
  <!-- Template JS File -->
  <script src="<?= base_url('stisla/dist/assets/js/scripts.js') ?>"></script>
  <script src="<?= base_url('stisla/dist/assets/js/custom.js') ?>"></script>
</body>
</html>