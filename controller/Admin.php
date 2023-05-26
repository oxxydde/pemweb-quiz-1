<?php 

require './controller/User.php';
require './model/m_mahasiswa.php';

class Admin extends User {

    public function __construct($uname, $email) {
        parent::__construct($uname, $email);
    }
    public static function logout() {
        setcookie("user", null, time() - 7200);
        header('Location: index.php');
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
                $success = Admin::tambahMahasiswa($input["nim"], $input["nama"], $input["email"], $input["prodi"]);
                break;
            case "update":
                $success = Admin::updateMahasiswa($input["nim"], $input["nama"], $input["email"], $input["prodi"]);
                break;
            case "hapus":
                $success = Admin::hapusMahasiswa($input["nim"]);
                break;
        }

        return ($success) ? "success" : "failed";
    }
}
