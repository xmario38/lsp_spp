<?php

require_once '../../config/Koneksi.php';

class Admin extends Koneksi {
    public function getDataPetugas($id) {
        $stmt = mysqli_query($this->konek, "SELECT * FROM tb_petugas WHERE id_petugas = '" . $id . "'");
        
        return $stmt;
    }

    public function getDataSPP() {
        $stmt = mysqli_query($this->konek, "SELECT * FROM tb_spp ORDER BY tahun ASC");

        return $stmt;
    }

    public function tambahDataSPP($tahun, $nominal) {
        $stmt = mysqli_query($this->konek, "INSERT INTO tb_spp VALUES ('', '" . $tahun . "', '" . $nominal . "')");

        if($stmt) {
            return true;
        } else {
            return false;
        }
    }
}