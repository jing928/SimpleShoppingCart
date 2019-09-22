<?php session_start();
require 'utils.php';

session_destroy();
$_SESSION = [];
redirect('../client/login.html');

