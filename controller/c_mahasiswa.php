<?php 

require 'Mahasiswa.php';
require './model/m_mahasiswa.php';

class c_mahasiswa {
    public static function dataMhsInvoke() {
        $mhsTmp = m_mahasiswa::getDataMahasiswa();
        $mahasiswas = array();

        foreach($mhsTmp as $i) {
            $mahasiswas[] = new Mahasiswa($i["nim"], $i["nama"], $i["email"], $i["programStudi"]);
        }

        include './view/v_data-mhs.php';
    }
    public static function tambahMahasiswa($nim, $nama, $email, $prodi) {
        return m_mahasiswa::addDataMahasiswa($nim, $nama, $email, $prodi);
    }
    public static function updateMahasiswa($nim, $nama, $email, $prodi) {
        return m_mahasiswa::editDataMahasiswaByNim($nim, $nama, $email, $prodi);
    }
    public static function hapusMahasiswa($nim) {
        return m_mahasiswa::deleteDataMahasiswaByNim($nim);
    }
    public static function handle($input) {
        $method = $input["method"];

        $success = null;
        switch ($method) {
            case "tambah":
                $success = c_mahasiswa::tambahMahasiswa($input["nim"], $input["nama"], $input["email"], $input["prodi"]);
                break;
            case "update":
                $success = c_mahasiswa::updateMahasiswa($input["nim"], $input["nama"], $input["email"], $input["prodi"]);
                break;
            case "hapus":
                $success = c_mahasiswa::hapusMahasiswa($input["nim"]);
                break;
        }

        return ($success) ? "success" : "failed";
    }
}