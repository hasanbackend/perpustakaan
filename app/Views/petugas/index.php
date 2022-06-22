<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <?php

    use App\Controllers\petugas;

    if (session()->get('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Data Petugas berhasil <strong><?= session()->getFlashdata('message'); ?></strong>
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
                        <th>Jabatan</th>
                        <th>No Telp</th>
                        <th>Alamat</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($petugas as $row) : ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $row['nama_petugas']; ?></td>
                            <td><?= $row['jabatan_petugas']; ?></td>
                            <td><?= $row['no_telp_petugas']; ?></td>
                            <td><?= $row['alamat_petugas']; ?></td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#modalUbah" id="btn-edit" data-id-petugas="<?= $row['id_petugas']; ?>" data-nama-petugas="<?= $row['nama_petugas']; ?>" data-jabatan-petugas="<?= $row['jabatan_petugas'] ?>" data-no-telp-petugas="<?= $row['no_telp_petugas']; ?>" data-alamat-petugas="<?= $row['alamat_petugas']; ?>" class=" btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" data-toggle="modal" data-target="#modalHapus" class="btn btn-sm btn-danger" id="btn-hapus" data-id-petugas="<?= $row['id_petugas']; ?>">
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
                <form action="<?= base_url('petugas/tambah') ?>" method="post">
                    <div class="form-group mb-0">
                        <label for="nama_petugas"></label>
                        <input type="text" name="nama_petugas" id="nama_petugas" class="form-control" placeholder="Masukan Nama">
                    </div>
                    <div class="form-group mb-0">
                        <label for="jabatan_petugas"></label>
                        <input type="text" name="jabatan_petugas" id="jabatan_petugas" class="form-control" placeholder="Masukan Jabatan">
                    </div>
                    <div class="form-group mb-0">
                        <label for="no_telp_petugas"></label>
                        <input type="text" name="no_telp_petugas" id="no_telp_petugas" class="form-control" placeholder="Masukan No Telp">
                    </div>
                    <div class="form-group mb-0">
                        <label for="alamat_petugas"></label>
                        <input type="numeric" name="alamat_petugas" id="alamat_petugas" class="form-control" placeholder="Masukan Alamat">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                <button data-url-hapus="<?= base_url("/petugas/hapus/") ?>" id="btn-buang" class="btn btn-danger">Yakin</button>
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
                <form action="<?= base_url('petugas/ubah') ?>" method="post">
                    <input type="hidden" name="id" id="id_petugas">
                    <div class="form-group mb-0">
                        <label for="nama_petugas"></label>
                        <input type="text" name="nama_petugas" id="nama_petugas" class="form-control" placeholder="Masukan Nama" value="<?= $row['nama_petugas'] ?>">
                    </div>
                    <div class=" form-group mb-0">
                        <label for="jabatan_petugas"></label>
                        <input type="text" name="jabatan_petugas" id="jabatan_petugas" class="form-control" placeholder="Masukan Jabatan" value="<?= $row['jabatan_petugas'] ?>">
                    </div>
                    <div class=" form-group mb-0">
                        <label for="no_telp_petugas"></label>
                        <input type="text" name="no_telp_petugas" id="no_telp_petugas" class="form-control" placeholder="Masukan No Telp" value="<?= $row['no_telp_petugas'] ?>">
                    </div>
                    <div class=" form-group mb-0">
                        <label for="alamat_petugas"></label>
                        <input type="numeric" name="alamat_petugas" id="alamat_petugas" class="form-control" placeholder="Masukan Alamat" value="<?= $row['alamat_petugas'] ?>">
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