<?= $this->extend('template/header') ?>

<?= $this->section('content') ?>

      
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
                  <?php if (session('role') != 'perawat'): ?>
                  <div class="card-header">
                        <button class="btn btn-success" data-toggle="modal" data-target="#tambahModalPendaftaran">Tambah</button>
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
                            <th>Nomor Registrasi</th>
                            <th>Tanggal Registrasi</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 1; ?>
                          <?php foreach($pendaftaran as $pd): ?>                                   
                          <tr>
                            <td>
                              <?=$no++?>
                            </td>
                            <td><?=$pd->nama ?></td>
                            <td><?=$pd->noregistrasi ?></td>
                            <td><?=$pd->tglregistrasi ?></td>
                            <td>
                                <a href="<?= base_url('pendaftaran/cetak/'.$pd->id) ?>" class="btn btn-danger" target="_blank"><i class="fas fa-file-pdf"></i></a>
                                <?php if (session('role') != 'perawat'): ?>
                                  <button data-toggle="modal" data-target="#editModalPendaftaran" class="btn btn-primary btn-edit-pendaftaran"
                                    data-id="<?= $pd->id ?>"
                                    data-pasienid="<?= $pd->pasienid ?>"
                                    data-noregistrasi="<?= $pd->noregistrasi ?>"
                                    data-tglregistrasi="<?= $pd->tglregistrasi ?>">Edit</button>
                                  <a href="#" class="btn btn-warning btn-delete-pendaftaran" data-id="<?= $pd->id ?>">Hapus</a>
                                <?php endif; ?>
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
          <div class="modal fade" tabindex="-1" role="dialog" id="tambahModalPendaftaran">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tambah Pendaftaran</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="formTambahPendaftaran">
                    <div class="form-group">
                      <label for="pasienid">Nama Pasien</label>
                      <select name="pasienid" class="form-control" required>
                        <option value="">-- Pilih Pasien --</option>
                        <?php foreach($pasien as $ps): ?>
                          <option value="<?= $ps->id ?>"><?= $ps->nama ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="noregistrasi">No Registrasi</label>
                      <input type="text" name="noregistrasi" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="tglregistrasi">Tanggal Registrasi</label>
                      <input type="date" name="tglregistrasi" class="form-control" required>
                    </div>
                  </form>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="btnSimpanPendaftaran">Save</button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" tabindex="-1" role="dialog" id="editModalPendaftaran">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Pendaftaran</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="formEditPendaftaran">
                    <input type="hidden" name="id" id="editIdPendaftaran">
                    <div class="form-group">
                      <label for="pasienid">Nama Pasien</label>
                      <select name="pasienid" id="editPasienid" class="form-control" required>
                        <option value="">-- Pilih Pasien --</option>
                        <?php foreach($pasien as $ps): ?>
                          <option value="<?= $ps->id ?>"><?= $ps->nama ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="noregistrasi">No Registrasi</label>
                      <input type="text" name="noregistrasi" class="form-control" id="editNoregistrasi" required>
                    </div>
                    <div class="form-group">
                      <label for="tglregistrasi">Tanggal Registrasi</label>
                      <input type="date" name="tglregistrasi" class="form-control" id="editTglregistrasi" required>
                    </div>
                  </form>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="btnUpdatePendaftaran">Save</button>
                </div>
              </div>
            </div>
          </div>
      

<?= $this->endSection() ?>
