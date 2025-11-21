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
                        <button class="btn btn-success" data-toggle="modal" data-target="#tambahModalKunjungan">Tambah</button>
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
                          <?php $no = 1; ?>
                          <?php foreach($kunjungan as $kj): ?>                                 
                          <tr>
                            <td>
                              <?=$no++ ?>
                            </td>
                            <td><?=$kj->nama ?></td>
                            <td><?=$kj->jenis_kunjungan ?></td>
                            <td><?=$kj->tglkunjungan ?></td>
                            <td>
                                <a href="<?= base_url('kunjungan/cetak/'.$kj->id) ?>" class="btn btn-danger" target="_blank"><i class="fas fa-file-pdf"></i></a>
                                <?php if (session('role') != 'perawat'): ?>
                                  <button data-toggle="modal" data-target="#editModalKunjungan" class="btn btn-primary btn-edit-kunjungan"
                                    data-id="<?= $kj->id ?>"
                                    data-pendaftaranpasienid="<?= $kj->pendaftaranpasienid ?>"
                                    data-jenis_kunjungan="<?= $kj->jenis_kunjungan ?>"
                                    data-tglkunjungan="<?= $kj->tglkunjungan ?>">Edit</button>
                                  <a href="#" class="btn btn-warning btn-delete-kunjungan" data-id="<?= $kj->id ?>">Hapus</a>
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
          <div class="modal fade" tabindex="-1" role="dialog" id="tambahModalKunjungan">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tambah Kunjungan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="formTambahKunjungan">
                    <div class="form-group">
                      <label for="pendaftaranpasienid">Nama Pasien Terdaftar</label>
                      <select name="pendaftaranpasienid" class="form-control" required>
                        <option value="">-- Pilih Pasien --</option>
                        <?php foreach($pendaftaran as $pd): ?>
                          <option value="<?= $pd->id ?>"><?= $pd->nama ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="jenis_kunjungan">Jenis Kunjungan</label>
                      <select name="jenis_kunjungan" class="form-control" required>
                        <option value="">-- Pilih Jenis --</option>
                        <?php foreach($jenis_kunjungan as $jk): ?>
                          <option value="<?= $jk->jenis ?>"><?= $jk->jenis ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="tglkunjungan">Tanggal Kunjungan</label>
                      <input type="date" name="tglkunjungan" class="form-control" required>
                    </div>
                  </form>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="btnSimpanKunjungan">Save</button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" tabindex="-1" role="dialog" id="editModalKunjungan">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Kunjungan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="formEditKunjungan">
                    <input type="hidden" name="id" id="editIdKunjungan">
                    <div class="form-group">
                      <label for="pendaftaranpasienid">Nama Pasien Terdaftar</label>
                      <select name="pendaftaranpasienid" id="editPendaftaranpasienid" class="form-control" required>
                        <option value="">-- Pilih Pasien --</option>
                        <?php foreach($pendaftaran as $pd): ?>
                          <option value="<?= $pd->id ?>"><?= $pd->nama ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="jenis_kunjungan">Jenis</label>
                      <select name="jenis_kunjungan" id="editJeniskunjungan" class="form-control" required>
                        <option value="">-- Pilih Jenis --</option>
                        <?php foreach($jenis_kunjungan as $jk): ?>
                          <option value="<?= $jk->jenis ?>"><?= $jk->jenis ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="tglkunjungan">Tanggal Registrasi</label>
                      <input type="date" name="tglkunjungan" class="form-control" id="editTglkunjungan" required>
                    </div>
                  </form>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="btnUpdateKunjungan">Save</button>
                </div>
              </div>
            </div>
          </div>
      

<?= $this->endSection() ?>
