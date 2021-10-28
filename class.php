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

class User
{
    public $user_name;
    public function login()
    {
        $result = Db::dbconnect()->query("SELECT * FROM users WHERE id = '$this->user_name'");
        $result = $result->fetch_array(MYSQLI_ASSOC);
        return $result;
    }
}
