<?php 

require './model/m_account.php';

class c_login {
    public static function invoke() {
        if (isset($_COOKIE['user'])) {
            header('Location: index.php');
        } else {
            $wrongInput = isset($_COOKIE["wrongpass"]);
            include './view/v_login.php';
        }
    }

    public static function login($input) {
        $user = $input['username'];
        $pwd = $input['password'];
        if (m_account::login($user, $pwd)) {            
            setcookie("user", $user, time() + 3600);
            header('Location: index.php');
            return;
        }
        setcookie("wrongpass", true, time() + 7200);
        header('Location: login.php');
    }

    public static function logout() {
        setcookie("user", null, time() - 7200);
        header('Location: index.php');
    }

}