<?php 

class Mahasiswa {
    private $nim, $nama, $prodi, $email;

    public function __construct($nim, $nama, $email, $prodi) {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->email = $email;
        $this->prodi = $prodi;
    }

    public function getNim() {
        return $this->nim;
    }
    public function getNama() {
        return $this->nama;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getProdi() {
        return $this->prodi;
    }

    public static function dataMhsInvoke() {
        require './model/m_mahasiswa.php';
        $mhsTmp = m_mahasiswa::getDataMahasiswa();
        $mahasiswas = array();

        foreach($mhsTmp as $i) {
            $mahasiswas[] = new Mahasiswa($i["nim"], $i["nama"], $i["email"], $i["programStudi"]);
        }

        include './view/v_data-mhs.php';
    }
}
