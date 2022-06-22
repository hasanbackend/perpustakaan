$(document).on('click', '#btn-edit', function(){
    $('.modal-body #id_petugas').val($(this).data('id-petugas'));
    $('.modal-body #nama_petugas').val($(this).data('nama-petugas'));
    $('.modal-body #jabatan_petugas').val($(this).data('jabatan-petugas'));
    $('.modal-body #no_telp_petugas').val($(this).data('no-telp-petugas'));
    $('.modal-body #alamat_petugas').val($(this).data('alamat-petugas'));
})

$(document).on('click', '#btn-hapus', function(e){
    $('#btn-buang').data('id-petugas', $(this).data('id-petugas'))
})
$(document).on('click', '#btn-buang', function(e) {
    let redirectUrl = $(this).data('url-hapus') + '/' + $(this).data('id-petugas')
    window.location.href = redirectUrl;
})

$(document).on('click', '#btn-edit', function(){
    $('.modal-body #id_anggota').val($(this).data('id-anggota'));
    $('.modal-body #nama_anggota').val($(this).data('nama-anggota'));
    $('.modal-body #no_telp_anggota').val($(this).data('no-telp-anggota'));
    $('.modal-body #alamat_anggota').val($(this).data('alamat-anggota'));
})

$(document).on('click', '#btn-hapus', function(e){
    $('#btn-buang1').data('id-anggota', $(this).data('id-anggota'))
})
$(document).on('click', '#btn-buang1', function(e) {
    let redirectUrl = $(this).data('url-hapus') + '/' + $(this).data('id-anggota')
    window.location.href = redirectUrl;
})

$(document).on('click', '#btn-edit', function(){
    $('.modal-body #id_buku').val($(this).data('id-buku'));
    $('.modal-body #judul_buku').val($(this).data('judul-buku'));
    $('.modal-body #penulis_buku').val($(this).data('penulis-buku'));
    $('.modal-body #penerbit_buku').val($(this).data('penerbit-buku'));
    $('.modal-body #tahun-terbit').val($(this).data('tahun-terbit'));
    $('.modal-body #_stok').val($(this).data('-stok'));
})

$(document).on('click', '#btn-hapus', function(e){
    $('#btn-buang2').data('id-buku', $(this).data('id-buku'))
})
$(document).on('click', '#btn-buang2', function(e) {
    let redirectUrl = $(this).data('url-hapus') + '/' + $(this).data('id-buku')
    window.location.href = redirectUrl;
})

$(document).on('click', '#btn-edit', function(){
    $('.modal-body #id_peminjaman').val($(this).data('id-peminjaman'));
    $('.modal-body #tanggal_peminjaman').val($(this).data('tanggal-peminjaman'));
    $('.modal-body #id_petugas').val($(this).data('id-petugas'));
    $('.modal-body #id_anggota').val($(this).data('id-anggota'));
    $('.modal-body #id_buku').val($(this).data('id-buku'));
})

$(document).on('click', '#btn-hapus', function(e){
    $('#btn-buang3').data('id-peminjaman', $(this).data('id-peminjaman'))
})
$(document).on('click', '#btn-buang3', function(e) {
    let redirectUrl = $(this).data('url-hapus') + '/' + $(this).data('id-peminjaman')
    window.location.href = redirectUrl;
})

$(document).on('click', '#btn-edit', function(){
    $('.modal-body #id_pengembalian').val($(this).data('id-pengembalian'));
    $('.modal-body #tanggal_pengembalian').val($(this).data('tanggal-pengembalian'));
    $('.modal-body #id_petugas').val($(this).data('id-petugas'));
    $('.modal-body #id_buku').val($(this).data('id-buku'));
    $('.modal-body #id_anggota').val($(this).data('id-anggota'));
})

$(document).on('click', '#btn-hapus', function(e){
    $('#btn-buang4').data('id-pengembalian', $(this).data('id-pengembalian'))
})
$(document).on('click', '#btn-buang4', function(e) {
    let redirectUrl = $(this).data('url-hapus') + '/' + $(this).data('id-pengembalian')
    window.location.href = redirectUrl;
})