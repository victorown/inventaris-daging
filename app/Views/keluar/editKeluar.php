<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<style>
  .table-responsive {
    overflow-x: auto;
  }

  .table td {
    white-space: normal;
    /* Agar teks tidak melebar dan turun ke bawah jika panjang */
    max-width: 200px;
    /* Sesuaikan lebar maksimum yang diinginkan */
    word-wrap: break-word;
    /* Jika teks terlalu panjang dan melebihi lebar maksimum */
  }

  .table td p {
    margin-bottom: 5px;
    /* Margin antara paragraf */
  }
</style>

<div class="row">
  <form action="/updateKeluar/<?= $keluar->id ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="id" value="<?= $keluar->id ?>">
    <div class="card px-3 py-2">
      <div class="form-group mb-3">
        <label class="form-control-label" for="basic-url">Bahan Baku</label>
        <select class="form-control" name="id_jenis_daging">
          <option>-- Pilih Bahan Baku --</option>
          <?php foreach ($daging as $j) : ?>
            <option value="<?= $j['id'] ?>"><?= $j['bahan_baku'] ?> - <?= $j['nama_jenis'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="form-group">
        <label class="form-control-label" for="basic-url">Jumlah</label>
        <div class="input-group">
          <textarea class="form-control" aria-label="With textarea" name="jumlah"><?= $keluar->jumlah ?></textarea>
        </div>
      </div>

      <div class="form-group mb-3">
        <label class="form-control-label" for="basic-url">Tanggal</label>
        <div class="input-group">
          <input type="date" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?= $keluar->tanggal ?>" name="tanggal">
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="float-end">
            <button class="btn btn-primary" style="background-color: #fbcf33;" type="submit"><i class="fas fa-save pe-2"></i>Update</button>
          </div>
          <div class="float-start">
            <a class="btn btn-primary" type="button" href="/keluar"><i class="fas fa-arrow-left pe-2"></i>Back</a>
          </div>
        </div>
      </div>
    </div>
  </form>

</div>



<?= $this->endSection() ?>