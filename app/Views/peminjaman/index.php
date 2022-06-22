<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <?php

    use App\Controllers\peminjaman;

    if (session()->get('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Data peminjaman berhasil <strong><?= session()->getFlashdata('message'); ?></strong>
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
                        <th>Tanggal peminjaman</th>
                        <th>Petugas</th>
                        <th>Anggota</th>
                        <th>Buku</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($peminjaman as $row) : ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $row['tanggal_peminjaman']; ?></td>
                            <td><?= $row['nama_petugas']; ?></td>
                            <td><?= $row['nama_anggota']; ?></td>
                            <td><?= $row['judul_buku']; ?></td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#modalUbah" id="btn-edit" data-id-peminjaman="<?= $row['id_peminjaman']; ?>" data-tanggal-peminjaman="<?= $row['tanggal_peminjaman']; ?>" data-id-petugas="<?= $row['id_petugas']; ?>" data-id-anggota="<?= $row['id_anggota']; ?>" data-id-buku="<?= $row['id_buku']; ?>" class=" btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" data-toggle="modal" data-target="#modalHapus" class="btn btn-sm btn-danger" id="btn-hapus" data-id-peminjaman="<?= $row['id_peminjaman']; ?>">
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
                <form action="<?= base_url('peminjaman/tambah') ?>" method="post">
                    <div class="form-group mb-2">
                        <label for="tanggal_peminjaman"></label>
                        <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman" class="form-control" placeholder="Masukan Tanggal Peminjaman">
                    </div>
                    <div>Nama Petugas</div>
                    <div class="form-group mb-2">
                        <select name="id_petugas" class=" form-control">
                            <?php foreach ($petugas as $row) : ?>
                                <option value="<?= $row['id_petugas'] ?>"><?php echo $row['nama_petugas'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>Nama Anggota</div>
                    <div class="form-group mb-0">
                        <select name="id_anggota" class=" form-control">
                            <?php foreach ($anggota as $row) : ?>
                                <option value="<?= $row['id_anggota'] ?>"><?php echo $row['nama_anggota'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>Judul Buku</div>
                    <div class="form-group mb-2">
                        <select name="id_buku" class=" form-control">
                            <?php foreach ($buku as $row) : ?>
                                <option value="<?= $row['id_buku'] ?>"><?php echo $row['judul_buku'] ?></option>
                            <?php endforeach; ?>
                        </select>
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
                <button data-url-hapus="<?= base_url("/peminjaman/hapus/") ?>" id="btn-buang3" class="btn btn-danger">Yakin</button>
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
                <form action="<?= base_url('peminjaman/ubah') ?>" method="post">
                    <input type="hidden" name="id" id="id_peminjaman">
                    <div class="form-group mb-2">
                        <label for="tanggal_peminjaman"></label>
                        <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman" class="form-control" placeholder="Masukan Tanggal Peminjaman">
                    </div>
                    <div>Nama Petugas</div>
                    <div class="form-group mb-2">
                        <select name="id_petugas" class=" form-control">
                            <?php foreach ($petugas as $row) : ?>
                                <option value="<?= $row['id_petugas'] ?>"><?php echo $row['nama_petugas'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>Nama Anggota</div>
                    <div class="form-group mb-0">
                        <select name="id_anggota" class=" form-control">
                            <?php foreach ($anggota as $row) : ?>
                                <option value="<?= $row['id_anggota'] ?>"><?php echo $row['nama_anggota'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>Judul Buku</div>
                    <div class="form-group mb-2">
                        <select name="id_buku" class=" form-control">
                            <?php foreach ($buku as $row) : ?>
                                <option value="<?= $row['id_buku'] ?>"><?php echo $row['judul_buku'] ?></option>
                            <?php endforeach; ?>
                        </select>
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