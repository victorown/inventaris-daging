<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<style>
  .hidden {
    display: none;
  }
</style>

<?php foreach ($jenis_daging as $jenis) : ?>
  <?php if (isset($alert[$jenis['iddaging']])) : ?>
    <div class="alert alert-danger"><?= $alert[$jenis['iddaging']] ?></div>
  <?php endif; ?>
<?php endforeach; ?>



<div class="row">
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">
                Jenis Daging
              </p>
              <h5 class="font-weight-bolder mb-0">
                <?= $jumlah_daging ?>
                <!-- <span class="text-success text-sm font-weight-bolder">+55%</span> -->
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="fas fa-drumstick-bite text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">
                Jumlah daging Masuk
              </p>
              <h5 class="font-weight-bolder mb-0">
                <?= $masuk ?>
                <!-- <span class="text-success text-sm font-weight-bolder">+3%</span> -->
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="fas fa-long-arrow-alt-up text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">
                Jumlah Daging Keluar
              </p>
              <h5 class="font-weight-bolder mb-0">
                <?= $keluar ?>
                <!-- <span class="text-danger text-sm font-weight-bolder">-2%</span> -->
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="fas fa-long-arrow-alt-down text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Stok</p>
              <h5 class="font-weight-bolder mb-0">
                <?= $stoks ?>
                <!-- <span class="text-success text-sm font-weight-bolder">+5%</span> -->
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="fas fa-box text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row mt-4">
  <div class="col-lg mb-lg-0 mb-4">
    <div class="card z-index-2">
      <div class="card-header pb-0">
        <h6>Laporan Bulanan</h6>
      </div>
      <div class="card-body p-3">
        <div class="row">
          <div class="col-lg-0">
            <div class="accordion accordion-flush" id="accordionFlushExample">
              <?php
              if (!empty($laporan_bulanan)) {
                // dd($laporan_bulanan);
                $previous_month = '';
                $months = [
                  '01' => 'Januari',
                  '02' => 'Februari',
                  '03' => 'Maret',
                  '04' => 'April',
                  '05' => 'Mei',
                  '06' => 'Juni',
                  '07' => 'Juli',
                  '08' => 'Agustus',
                  '09' => 'September',
                  '10' => 'Oktober',
                  '11' => 'November',
                  '12' => 'Desember',
                ];
                foreach ($laporan_bulanan as $detail) {
                  $bulan_tahun = explode('-', $detail['bulan']);
                  $bulan = isset($months[$bulan_tahun[1]]) ? $months[$bulan_tahun[1]] : 'Belum ada daging dalam gudang';
                  if ($detail['bulan'] !== $previous_month) {
                    if ($previous_month !== '') {
                      echo '</tbody></table></div></div></div>';
                    }
                    echo '
                    <div class="accordion-item" >
                      <h2 class="accordion-header">
                        <button class="accordion-button border fw-bold"  type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $detail['bulan'] . '" aria-expanded="true" aria-controls="collapse' . $detail['bulan'] . '">
                            ' . $bulan . ' ' . $bulan_tahun[0] . '
                        </button>
                      </h2>
                      <div id="collapse' . $detail['bulan'] . '" class="accordion-collapse collapse">
                        <div class="accordion-body">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th>Nama Jenis</th>
                                      <th>Total Daging Masuk</th>
                                      <th>Total Daging Keluar</th>
                                  </tr>
                              </thead>
                              <tbody>';
                  }
                  echo '
                                  <tr>
                                      <td>' . $detail['nama_jenis'] . '</td>
                                      <td>' . $detail['total_daging_masuk'] . '</td>
                                      <td>' . $detail['total_daging_keluar'] . '</td>
                                  </tr>';
                  $previous_month = $detail['bulan'];
                }
              } else {
                echo '<p>Tidak ada laporan bulanan yang tersedia. </p>';
              }
              ?>
              </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>

<?= $this->endSection() ?>