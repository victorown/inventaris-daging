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

<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif ?>

<div class="row">

    <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">No</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Bahan Baku</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Jenis Bahan Baku</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Stok Tersisa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($stok as $x => $d) : ?>
                        <tr>
                            <td><?= $x + 1 ?></td>
                            <td><?= $d['bahan_baku'] ?></td>
                            <td><?= $d['nama_jenis'] ?></td>
                            <td><?= $d['stok'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

</div>



<?= $this->endSection() ?>