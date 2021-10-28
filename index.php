<?php
require 'class.php';
$user = new User();
$user->user_name = '32';
print_r($user->login());