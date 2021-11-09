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

    public function getDataSiswa() {
        $stmt = mysqli_query($this->konek, "SELECT * FROM tb_siswa INNER JOIN tb_spp ON tb_siswa.id_spp = tb_spp.id_spp ORDER BY NISN ASC");
    
        return $stmt;
    }

    public function cekDataSiswa($nisn, $nis) {
        $stmt = mysqli_query($this->konek, "SELECT * FROM tb_siswa WHERE nisn = '$nisn' OR nis = '$nis'");

        if($stmt) {
            return true;
        } else {
            return false;
        }
    }

    public function tambahDataSiswa($nisn, $nis, $nama, $kelas, $tahun) {
        $stmt = mysqli_query($this->konek, "INSERT INTO tb_siswa VALUES ('$nisn', '$nis', '$nama', '$kelas', '$tahun')");

        if($stmt) {
            return true;
        } else {
            return false;
        }
    }

    public function tambahDataPembayaran($nisn, $bulan, $id_spp) {
        $stmt = mysqli_query($this->konek, "INSERT INTO tb_pembayaran (nisn, bulan_dibayar, id_spp) VALUES ('$nisn', '$bulan', '$id_spp'");

        if($stmt) {
            return true;
        } else {
            return false;
        }
    }
}