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
  <form action="saveDaging" method="POST" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="card px-3 py-2">
      <div class="form-group mb-3">
        <label class="form-control-label" for="basic-url">Jenis Daging</label>
        <div class="input-group">
          <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="nama_jenis">
        </div>
      </div>
      <div class="form-group">
        <label class="form-control-label" for="basic-url">Jenis Daging</label>
        <div class="input-group">
          <textarea class="form-control" aria-label="With textarea" name="desc"></textarea>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="float-end">
            <button class="btn btn-primary" style="background-color: #fbcf33;" type="submit"><i class="fas fa-save pe-2"></i>Save</button>
          </div>
          <div class="float-start">
            <a class="btn btn-primary" type="button" href="/daging"><i class="fas fa-arrow-left pe-2"></i>Back</a>
          </div>
        </div>
      </div>
    </div>
  </form>

</div>



<?= $this->endSection() ?>