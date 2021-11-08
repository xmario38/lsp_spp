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

    public function getDataSPPbyId($id) {
        $stmt = mysqli_query($this->konek, "SELECT * FROM tb_spp WHERE id_spp = '".$id."'");

        return $stmt;
    }

    public function ubahDataSPP($tahun, $nominal, $id) {
        $stmt = mysqli_query($this->konek, "UPDATE tb_spp SET tahun = '".$tahun."', nominal = '".$nominal."' WHERE id_spp = ".$id);

        if($stmt) {
            return true;
        } else {
            return false;
        }
    }
    public function hapusDataSPP($id) {
        $stmt = mysqli_query($this->konek, "DELETE FROM tb_spp WHERE id_spp = ".$id);

        if($stmt) {
            return true;
        } else {
            return false;
        }
    }
}