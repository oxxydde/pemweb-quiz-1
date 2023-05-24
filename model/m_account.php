<?php 

class m_account {
    public static function login($username, $password) {
        require './dbConn.php';
        
        $result = $conn->execute_query("SELECT username, password FROM user WHERE username = ?;", [$password]);
        if ($result->num_rows <= 0) return false;
        while ($row = $result->fetch_assoc()) {
            if ($row["username"] == $username && $row["password"] == $password) return true;
        }
        return false;
    }
    
    public static function getUserInfo($username) {
        require './dbConn.php';

        $result = $conn->execute_query("
            SELECT u.username AS uU, u.email AS uE, a.username AS aU
            FROM user AS u, admin AS a
            WHERE u.username=? OR a.username=?;"
        , [$username, $username]);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return ($row !== false) ? $row : [];
        }
    }
}