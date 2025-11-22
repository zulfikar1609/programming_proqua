<?= $this->extend('template/header') ?>

<?= $this->section('content') ?>

      
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Dashboard</h2>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h1>Selamat Datang <?= session()->get('nama'); ?></h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      

<?= $this->endSection() ?>
