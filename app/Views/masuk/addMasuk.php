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
    <form action="saveMasuk" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="card px-3 py-2">
            <div class="form-group mb-3">
                <label class="form-control-label" for="basic-url">Jenis Daging</label>

                <select class="form-control" name="id_jenis_daging">
                    <option>-- Pilih Jenis Daging --</option>
                    <?php foreach ($jenis as $j) : ?>
                        <option value="<?= $j['iddaging'] ?>"><?= $j['nama_jenis'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label class="form-control-label" for="basic-url">Jumlah</label>
                <div class="input-group">
                    <input class="form-control" name="jumlah"></input>
                </div>
            </div>
            <div class="form-group">
                <label for="example-date-input" class="form-control-label">Tanggal</label>
                <input class="form-control" type="date" value="<?= date('y-m-d') ?>" name="tanggal" id="example-date-input">
            </div>
            <div class="row">
                <div class="col">
                    <div class="float-end">
                        <button class="btn btn-primary" style="background-color: #fbcf33;" type="submit"><i class="fas fa-save pe-2"></i>Save</button>
                    </div>
                    <div class="float-start">
                        <a class="btn btn-primary" type="button" href="/masuk"><i class="fas fa-arrow-left pe-2"></i>Back</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>



<?= $this->endSection() ?>