<?php
require 'class.php';
$user = new auth();
$user->login = $user->string('23423123523@mail.ru');
$user->password = $user->string('12345');
echo $user->login();
