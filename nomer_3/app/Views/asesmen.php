<?= $this->extend('template/header') ?>

<?= $this->section('content') ?>

        <section class="section">
          <div class="section-header">
            <h1>Asesmen</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Modules</a></div>
              <div class="breadcrumb-item">DataTables</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Asesmen</h2>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <button class="btn btn-success" data-toggle="modal" data-target="#tambahModalAsesmen">Tambah</button>
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
                            <th>Jenis Kunjungan</th>
                            <th>Keluhan Utama</th>
                            <th>Keluhan Tambahan</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody> 
                          <?php $no = 1; ?>
                          <?php foreach($asesmen as $as): ?>                                    
                          <tr>
                            <td>
                              <?=$no++?>
                            </td>
                            <td><?=$as->nama ?></td>
                            <td><?=$as->jenis_kunjungan ?></td>
                            <td><?=$as->keluhan_utama ?></td>
                            <td><?=$as->keluhan_tambahan ?></td>
                            <td>
                                <a href="<?= base_url('asesmen/cetak/'.$as->id) ?>" class="btn btn-danger" target="_blank"><i class="fas fa-file-pdf"></i></a>
                                <button data-toggle="modal" data-target="#editModalAsesmen" class="btn btn-primary btn-edit-asesmen"
                                    data-id="<?= $as->id ?>"
                                    data-kunjunganid="<?= $as->kunjunganid ?>"
                                    data-keluhan_utama="<?= $as->keluhan_utama ?>"
                                    data-keluhan_tambahan="<?= $as->keluhan_tambahan ?>">Edit</button>
                                <a href="#" class="btn btn-warning btn-delete-asesmen" data-id="<?= $as->id ?>">Hapus</a>
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
          <div class="modal fade" tabindex="-1" role="dialog" id="tambahModalAsesmen">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tambah Asesmen</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="formTambahAsesmen">
                    <div class="form-group">
                      <label for="kunjunganid">Nama Pasien Kunjungan</label>
                      <select name="kunjunganid" class="form-control" required>
                        <option value="">-- Pilih Pasien --</option>
                        <?php foreach($kunjungan as $kj): ?>
                          <option value="<?= $kj->id ?>"><?= $kj->nama ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Keluhan Utama</label>
                      <textarea class="form-control" name="keluhan_utama" required></textarea>
                    </div>
                    <div class="form-group">
                      <label>Keluhan Tambahan</label>
                      <textarea class="form-control" name="keluhan_tambahan" required></textarea>
                    </div>
                  </form>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="btnSimpanAsesmen">Save</button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" tabindex="-1" role="dialog" id="editModalAsesmen">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Asesmen</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="formEditAsesmen">
                    <input type="hidden" name="id" id="editIdAsesmen">
                    <div class="form-group">
                      <label for="kunjunganid">Nama Pasien Kunjungan</label>
                      <select name="kunjunganid" id="editKunjunganid" class="form-control" required>
                        <option value="">-- Pilih Pasien --</option>
                        <?php foreach($kunjungan as $kj): ?>
                          <option value="<?= $kj->id ?>"><?= $kj->nama ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                        <label>Keluhan Utama</label>
                        <textarea class="form-control" name="keluhan_utama" id="editKeluhanutama" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Keluhan Tambahan</label>
                        <textarea class="form-control" name="keluhan_tambahan" id="editKeluhantambahan" required></textarea>
                    </div>
                  </form>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="btnUpdateAsesmen">Save</button>
                </div>
              </div>
            </div>
          </div>

<?= $this->endSection() ?>
