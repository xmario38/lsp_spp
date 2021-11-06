<?php 
require_once 'header.php';

if(isset($_GET['p'])) {
    if($_GET['p'] == 'siswa') {
        require_once 'data-siswa.php'; // belum dibuat
    } elseif($_GET['p'] == 'petugas') {
        require_once 'data-petugas.php'; // belum dibuat
    } elseif($_GET['p'] == 'spp') {
        require_once 'data-spp.php'; // akan dibuat
    } elseif($_GET['p'] == 'tambah-spp') {
        require_once 'tambah-spp.php'; 
    } elseif($_GET['p'] == 'ubah-spp') {
        require_once 'ubah-spp.php'; 
    } elseif($_GET['p'] == 'hapus-spp') {
        // hapus data spp
    } else {
        echo '<script>alert("Halaman tidak ada!")</script>';
    }
}

require_once 'footer.php';
?>