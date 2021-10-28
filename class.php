<?php
class Db
{
    public static function dbconnect()
    {
        $connect = mysqli_connect("localhost", "root", "", "btc") or die("Couldn't connect");
        $connect->set_charset("utf8");
        return $connect;
    }
}

class auth
{
    public $login;
    public $password;


    /* Защита для SQL */
    public function string($data) {
        $data =  Db::dbconnect()->real_escape_string($data);
        return $data;
    }
    /* Авторизация пользователя */
    public function login()
    {
        $result = Db::dbconnect()->query("SELECT mail FROM users WHERE mail = '$this->login'");
        $result = $result->fetch_array(MYSQLI_ASSOC);
        if($result['mail'] == $this->login) {
            $result = Db::dbconnect()->query("SELECT pass FROM users WHERE mail = '$this->login'");
            $result = $result->fetch_array(MYSQLI_ASSOC);
            if (password_verify($this->password, $result['pass'])) {
                $_SESSION['auth'] = 1;
                return 'Пароль правильный!';
            } else {
                return 'Пароль неправильный.';
            }
        } 
    }
}
