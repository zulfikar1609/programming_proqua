<?= $this->extend('template/header') ?>

<?= $this->section('content') ?>

      
        <section class="section">
          <div class="section-header">
            <h1>Pasien</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Pasien</h2>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <button class="btn btn-success" data-toggle="modal" data-target="#tambahModal">Tambah</button>
                    <button class="btn btn-success" id="btnImportDummy">Import Dummy</button>
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
                            <th>Norm</th>
                            <th>Alamat</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody> 
                          <?php $no = 1; ?>
                          <?php foreach($pasien as $ps): ?>                              
                          <tr>
                            <td>
                              <?=$no++?>
                            </td>
                            <td><?=$ps->nama ?></td>
                            <td><?=$ps->norm ?></td>
                            <td><?=$ps->alamat ?></td>
                            <td>
                                <a href="<?= base_url('pasien/cetak/'.$ps->id) ?>" class="btn btn-danger" target="_blank"><i class="fas fa-file-pdf"></i></a>
                                <button data-toggle="modal" data-target="#editModal" class="btn btn-primary btn-edit" 
                                  data-id="<?= $ps->id ?>" 
                                  data-nama="<?= $ps->nama ?>" 
                                  data-norm="<?= $ps->norm ?>" 
                                  data-alamat="<?= $ps->alamat ?>">Edit</button>
                                <a href="#" class="btn btn-warning btn-delete" data-id="<?= $ps->id ?>">Hapus</a>
                            </td>
                          </tr>
                          <?php endforeach ?>
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
                  <h5 class="modal-title">Tambah Pasien</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="formTambah">
                    <div class="form-group">
                      <label>Nama Pasien</label>
                      <input type="text" class="form-control" name="nama" required>
                    </div>

                    <div class="form-group">
                      <label>No. Rekam Medis</label>
                      <input type="text" class="form-control" name="norm" required>
                    </div>

                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea class="form-control" name="alamat" required></textarea>
                    </div>
                  </form>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="btnSimpan">Save</button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" tabindex="-1" role="dialog" id="editModal">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Pasien</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="formEdit">
                    <input type="hidden" name="id" id="editId">
                    <div class="form-group">
                        <label>Nama Pasien</label>
                        <input type="text" class="form-control" name="nama" id="editNama" required>
                    </div>
                    <div class="form-group">
                        <label>No. Rekam Medis</label>
                        <input type="text" class="form-control" name="norm" id="editNorm" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat" id="editAlamat" required></textarea>
                    </div>
                  </form>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="btnUpdate">Save</button>
                </div>
              </div>
            </div>
          </div>

   

      

<?= $this->endSection() ?>
