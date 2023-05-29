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
}
