<?php

require_once '../../config/Koneksi.php';

class Admin extends Koneksi {
    public function getDataPetugas($id) {
        $stmt = mysql_query($this->konek, "SELECT * FROM tb_petugas WHERE id_petugas = '"
            . $id . "'");
        
        return $stmt;
    }
}