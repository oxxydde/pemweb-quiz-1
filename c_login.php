<?php 

class login {
    public function invoke($wrongCredential = false) {
        if ($_COOKIE['user'] == 'admin') {
            header('Location: index.php');
        } else {
            include 'v_login.php';
        }
    }

    public function login($input) {
        $user = $input['username'];
        $pwd = $input['password'];
        if ($user == 'admin' && $pwd == 'admin') {
            setcookie("user", "admin", time() + 3600);
            header('Location: .');
        } else {
            $this->invoke(true);
        }
    }
    
    public static function logout() {
        setcookie("user", null, time() - 7200);
        header('Location: index.php');
    }
}