<?php 

class m_mahasiswa {
    public static function addDataMahasiswa($nim, $nama, $email, $prodi) {
        require 'dbConn.php';
        $conn->execute_query("
            INSERT INTO mahasiswa (nim, nama, email, programStudi)
            VALUES (?, ?, ?, ?);
        ", [$nim, $nama, $email, $prodi]);
        
        $affectedRows = $conn->affected_rows;
        
        return $affectedRows > 0;
    }

    public static function getDataMahasiswa() {
        require 'dbConn.php';
        $result = $conn->execute_query("SELECT * FROM mahasiswa;");

        $returnResult = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $returnResult[] = $row;
            }
        }

        return $returnResult;
    }
    
    
    public static function editDataMahasiswaByNim($nim, $newNama, $newEmail, $newProdi) {
        require 'dbConn.php';
        $conn->execute_query("
        UPDATE mahasiswa
        SET nama=?, email=?, programStudi=?
        WHERE nim=?;
        ", [$newNama, $newEmail, $newProdi, $nim]);
        
        $affectedRows = $conn->affected_rows;
        
        return $affectedRows > 0;
    }
    
    public static function deleteDataMahasiswaByNim($nim) {
        require 'dbConn.php';
        $conn->execute_query("DELETE FROM mahasiswa WHERE nim=?", [$nim]);
        $affectedRows = $conn->affected_rows;

        return $affectedRows > 0;
    }
}