<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <?php

    use App\Controllers\buku;

    if (session()->get('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Data Buku berhasil <strong><?= session()->getFlashdata('message'); ?></strong>
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
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Stok</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($buku as $row) : ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $row['judul_buku']; ?></td>
                            <td><?= $row['penulis_buku']; ?></td>
                            <td><?= $row['penerbit_buku']; ?></td>
                            <td><?= $row['tahun_terbit']; ?></td>
                            <td><?= $row['stok']; ?></td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#modalUbah" id="btn-edit" data-id-buku="<?= $row['id_buku']; ?>" data-judul-buku="<?= $row['judul_buku']; ?>" data-penulis-buku="<?= $row['penulis_buku']; ?>" data-penerbit-buku="<?= $row['penerbit_buku']; ?>" data-tahun-terbit="<?= $row['tahun_terbit']; ?>" class=" btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" data-toggle="modal" data-target="#modalHapus" class="btn btn-sm btn-danger" id="btn-hapus" data-id-buku="<?= $row['id_buku']; ?>">
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
                <form action="<?= base_url('buku/tambah') ?>" method="post">
                    <div class="form-group mb-0">
                        <label for="judul_buku"></label>
                        <input type="text" name="judul_buku" id="judul_buku" class="form-control" placeholder="Masukan Judul">
                    </div>
                    <div class="form-group mb-0">
                        <label for="penulis_buku"></label>
                        <input type="text" name="penulis_buku" id="penulis_buku" class="form-control" placeholder="Masukan Penulis">
                    </div>
                    <div class="form-group mb-0">
                        <label for="penerbit_buku"></label>
                        <input type="text" name="penerbit_buku" id="penerbit_buku" class="form-control" placeholder="Masukan Penerbit">
                    </div>
                    <div class="form-group mb-0">
                        <label for="tahun_terbit"></label>
                        <input type="numeric" name="tahun_terbit" id="tahun_terbit" class="form-control" placeholder="Masukan Tahun Terbit">
                    </div>
                    <div class="form-group mb-0">
                        <label for="stok"></label>
                        <input type="numeric" name="stok" id="stok" class="form-control" placeholder="Masukan Stok">
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
                <button data-url-hapus="<?= base_url("/buku/hapus/") ?>" id="btn-buang2" class="btn btn-danger">Yakin</button>
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
                <form action="<?= base_url('buku/ubah') ?>" method="post">
                    <input type="hidden" name="id" id="id_buku">
                    <div class="form-group mb-0">
                        <label for="judul_buku"></label>
                        <input type="text" name="judul_buku" id="judul_buku" class="form-control" placeholder="Masukan Judul" value="<?= $row['judul_buku'] ?>">
                    </div>
                    <div class=" form-group mb-0">
                        <label for="penulis_buku"></label>
                        <input type="text" name="penulis_buku" id="penulis_buku" class="form-control" placeholder="Masukan No Telp" value="<?= $row['penulis_buku'] ?>">
                    </div>
                    <div class=" form-group mb-0">
                        <label for="penerbit_buku"></label>
                        <input type="text" name="penerbit_buku" id="penerbit_buku" class="form-control" placeholder="Masukan Penerbit " value="<?= $row['penerbit_buku'] ?>">
                    </div>
                    <div class=" form-group mb-0">
                        <label for="tahun_terbit"></label>
                        <input type="numeric" name="tahun_terbit" id="tahun_terbit" class="form-control" placeholder="Masukan Penerbit " value="<?= $row['tahun_terbit'] ?>">
                    </div>
                    <div class=" form-group mb-0">
                        <label for="stok"></label>
                        <input type="numeric" name="stok" id="stok" class="form-control" placeholder="Masukan Stok " value="<?= $row['stok'] ?>">
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