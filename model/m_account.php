<?php 

class m_account {
    public static function login($uname, $pwd) {
        require 'dbConn.php';
        $result = $conn->execute_query('SELECT username, password FROM user WHERE username=?', [$uname]);
        if ($result->num_rows <= 0) return false;
        while ($row = $result->fetch_assoc()) {
            if ($row["username"] == $uname && $row["password"] == $pwd) return true;
        }
        return false;
    }
    
    public static function getUserInfo($uname) {
        require 'dbConn.php';

        $result = $conn->execute_query("
            SELECT u.username AS uU, u.email AS uE
            FROM user AS u
            WHERE u.username=?;"
        , [$uname]);

        $returnResult = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $returnResult[] = $row;
            }
        }
        return $returnResult;
    }
}