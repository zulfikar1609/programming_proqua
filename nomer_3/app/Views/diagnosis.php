<?= $this->extend('template/header') ?>

<?= $this->section('content') ?>

        <section class="section">
          <div class="section-header">
            <h1>Diagnosis</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Diagnosis</h2>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <button class="btn btn-success" data-toggle="modal" data-target="#tambahModalDiagnosis">Tambah</button>
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
                            <th>Keluhan Utama</th>
                            <th>Keluhan Tambahan</th>
                            <th>Diagnosa</th>
                            <th>Tindakan Penanganan</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody> 
                          <?php $no = 1; ?>
                          <?php foreach($diagnosis as $ds): ?>                                    
                          <tr>
                            <td>
                              <?=$no++?>
                            </td>
                            <td><?=$ds->nama ?></td>
                            <td><?=$ds->keluhan_utama ?></td>
                            <td><?=$ds->keluhan_tambahan ?></td>
                            <td><?=$ds->diagnosa ?></td>
                            <td><?=$ds->tindakan_penanganan ?></td>
                            <td>
                                <a href="<?= base_url('diagnosis/cetak/'.$ds->id) ?>" class="btn btn-danger" target="_blank"><i class="fas fa-file-pdf"></i></a>
                                <button data-toggle="modal" data-target="#editModalDiagnosis" class="btn btn-primary btn-edit-diagnosis"
                                    data-id="<?= $ds->id ?>"
                                    data-asesmenid="<?= $ds->asesmenid ?>"
                                    data-diagnosa="<?= $ds->diagnosa ?>"
                                    data-tindakan_penanganan="<?= $ds->tindakan_penanganan ?>">Edit</button>
                                <a href="#" class="btn btn-warning btn-delete-diagnosis" data-id="<?= $ds->id ?>">Hapus</a>
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
          <div class="modal fade" tabindex="-1" role="dialog" id="tambahModalDiagnosis">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tambah Diagnosis</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="formTambahDiagnosis">
                    <div class="form-group">
                      <label for="asesmenid">Nama Pasien Asesmen</label>
                      <select name="asesmenid" class="form-control" required>
                        <option value="">-- Pilih Pasien --</option>
                        <?php foreach($asesmen as $as): ?>
                          <option value="<?= $as->id ?>"><?= $as->nama ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Diagnosa</label>
                      <textarea class="form-control" name="diagnosa" required></textarea>
                    </div>
                    <div class="form-group">
                      <label>Tindakan Penanganan</label>
                      <textarea class="form-control" name="tindakan_penanganan" required></textarea>
                    </div>
                  </form>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="btnSimpanDiagnosis">Save</button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" tabindex="-1" role="dialog" id="editModalDiagnosis">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Diagnosis</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="formEditDiagnosis">
                    <input type="hidden" name="id" id="editIdDiagnosis">
                    <div class="form-group">
                      <label for="asesmenid">Nama Pasien Asesmen</label>
                      <select name="asesmenid" id="editAsesmenid" class="form-control" required>
                        <option value="">-- Pilih Pasien --</option>
                        <?php foreach($asesmen as $as): ?>
                          <option value="<?= $as->id ?>"><?= $as->nama ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                        <label>Diagnosa</label>
                        <textarea class="form-control" name="diagnosa" id="editDiagnosa" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tindakan Penanganan</label>
                        <textarea class="form-control" name="tindakan_penanganan" id="editTindakanpenanganan" required></textarea>
                    </div>
                  </form>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="btnUpdateDiagnosis">Save</button>
                </div>
              </div>
            </div>
          </div>

<?= $this->endSection() ?>
