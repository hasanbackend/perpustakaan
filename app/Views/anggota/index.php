<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <?php

    use App\Controllers\anggota;

    if (session()->get('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Data Anggota berhasil <strong><?= session()->getFlashdata('message'); ?></strong>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-6">
            <?php
            if (session()->get('err')) {
                echo "<div class='alert alert-danger' role='alert'>" . session()->get('err') .  "</div>";
            }
            ?>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                <i class="fa fa-plus">Tambah Data</i>
            </button>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>No Telp</th>
                        <th>Alamat</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($anggota as $row) : ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $row['nama_anggota']; ?></td>
                            <td><?= $row['no_telp_anggota']; ?></td>
                            <td><?= $row['alamat_anggota']; ?></td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#modalUbah" id="btn-edit" data-id-anggota="<?= $row['id_anggota']; ?>" data-nama-anggota="<?= $row['nama_anggota']; ?>" data-no-telp-anggota="<?= $row['no_telp_anggota']; ?>" data-alamat-anggota="<?= $row['alamat_anggota']; ?>" class=" btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" data-toggle="modal" data-target="#modalHapus" class="btn btn-sm btn-danger" id="btn-hapus" data-id-anggota="<?= $row['id_anggota']; ?>">
                                    <i class="fa fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>

    </div>

</div>

<!-- Modal Tambah-->
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah <?= $judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('anggota/tambah') ?>" method="post">
                    <div class="form-group mb-0">
                        <label for="nama_anggota"></label>
                        <input type="text" name="nama_anggota" id="nama_anggota" class="form-control" placeholder="Masukan Nama">
                    </div>
                    <div class="form-group mb-0">
                        <label for="no_telp_anggota"></label>
                        <input type="text" name="no_telp_anggota" id="no_telp_anggota" class="form-control" placeholder="Masukan No Telp">
                    </div>
                    <div class="form-group mb-0">
                        <label for="alamat_anggota"></label>
                        <input type="numeric" name="alamat_anggota" id="alamat_anggota" class="form-control" placeholder="Masukan Alamat">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Hapus-->
<div class="modal fade" id="modalHapus">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                Apakah anda yakin ingin menghapus ?"
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button data-url-hapus="<?= base_url("/anggota/hapus/") ?>" id="btn-buang1" class="btn btn-danger">Yakin</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ubah-->
<div class="modal fade" id="modalUbah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah <?= $judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('anggota/ubah') ?>" method="post">
                    <input type="hidden" name="id" id="id_anggota">
                    <div class="form-group mb-0">
                        <label for="nama_anggota"></label>
                        <input type="text" name="nama_anggota" id="nama_anggota" class="form-control" placeholder="Masukan Nama" value="<?= $row['nama_anggota'] ?>">
                    </div>
                    <div class=" form-group mb-0">
                        <label for="no_telp_anggota"></label>
                        <input type="text" name="no_telp_anggota" id="no_telp_anggota" class="form-control" placeholder="Masukan No Telp" value="<?= $row['no_telp_anggota'] ?>">
                    </div>
                    <div class=" form-group mb-0">
                        <label for="alamat_anggota"></label>
                        <input type="numeric" name="alamat_anggota" id="alamat_anggota" class="form-control" placeholder="Masukan Alamat" value="<?= $row['alamat_anggota'] ?>">
                    </div>
            </div>
            <div class=" modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="ubah" class="btn btn-primary">Ubah Data</button>
            </div>
            </form>
        </div>
    </div>
</div>