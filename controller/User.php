<?php 

require './model/m_account.php';

class User {
    private $username, $email;

    public function __construct($username, $email) {
        $this->username = $username;
        $this->email = $email;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public static function login($input) {
        $user = $input['username'];
        $pwd = $input['password'];
        if (m_account::login($user, $pwd)) {            
            setcookie("user", $user, time() + 3600);
            header('Location: index.php');
            return;
        }
        header('Location: login.php');

    }

    public static function invoke() {
        if (isset($_COOKIE['user'])) {
            header('Location: index.php');
        } else {
            include './view/v_login.php';
        }
    }
}
