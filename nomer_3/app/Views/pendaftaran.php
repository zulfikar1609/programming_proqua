<?= $this->extend('template/header') ?>

<?= $this->section('content') ?>

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Pendaftaran</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Modules</a></div>
              <div class="breadcrumb-item">DataTables</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Pendaftaran</h2>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <button class="btn btn-success">Tambah</button>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Nama Pasien</th>
                            <th>Nomor Registrasi</th>
                            <th>Tanggal Registrasi</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>                                 
                          <tr>
                            <td>
                              1
                            </td>
                            <td>Create a mobile app</td>
                            <td>2018-01-20</td>
                            <td>Perut mules</td>
                            <td>
                                <a href="#" class="btn btn-danger"><i class="fas fa-file-pdf"></i></a>
                                <a href="#" class="btn btn-primary">Edit</a>
                                <a href="#" class="btn btn-warning">Hapus</a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

<?= $this->endSection() ?>
