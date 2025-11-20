<?= $this->extend('template/header') ?>

<?= $this->section('content') ?>

      
        <section class="section">
          <div class="section-header">
            <h1>Kunjungan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Modules</a></div>
              <div class="breadcrumb-item">DataTables</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Kunjungan</h2>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <?php if (session('role') != 'perawat'): ?>
                  <div class="card-header">
                        <button class="btn btn-success" data-toggle="modal" data-target="#tambahModal">Tambah</button>
                  </div>
                  <?php endif; ?>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Nama Pasien</th>
                            <th>Jenis kunjungan</th>
                            <th>Tanggal Kunjungan</th>
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
                                <?php if (session('role') != 'perawat'): ?>
                                  <button data-toggle="modal" data-target="#editModal" class="btn btn-primary">Edit</button>
                                  <a href="#" class="btn btn-warning btn-delete">Hapus</a>
                                <?php endif; ?>
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
          <div class="modal fade" tabindex="-1" role="dialog" id="tambahModal">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tambah Kunjungan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save</button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" tabindex="-1" role="dialog" id="editModal">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Kunjungan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save</button>
                </div>
              </div>
            </div>
          </div>
      

<?= $this->endSection() ?>
