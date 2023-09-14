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
    }
</style>

<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif ?>

<div class="row mb-2">
    <div class="">
        <a href="addKeluar" type="button" class="btn btn-warning"><i class="fas fa-plus pe-2"></i> Tambah data</a>
    </div>
</div>

<div class="row">

    <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">No</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Jenis Daging</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Jumlah</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                        <th class="text-secondary text-uppercase text-xs font-weight-bolder opacity-7 ps-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($keluar as $x => $d) : ?>
                        <tr>
                            <td><?= $x + 1 ?></td>
                            <td><?= $d->nama_jenis ?></td>
                            <td><?= $d->jumlah ?></td>
                            <td><?= $d->tanggal ?></td>
                            <td>
                                <div class="d-flex justify-content-start">
                                    <div class="me-2">
                                        <a href="editKeluar/<?= $d->id ?>" class="btn btn-warning btn-xs font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user" type="button">
                                            Edit
                                        </a>
                                    </div>
                                    <div class="me-2">
                                        <a href="deleteKeluar/<?= $d->id ?>" class="btn btn-danger btn-xs font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user" type="button" onclick="return confirm('Apakah anda yakin?')">
                                            Hapus
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

</div>



<?= $this->endSection() ?>