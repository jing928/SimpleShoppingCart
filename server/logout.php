<?php session_start();
require 'utils.php';

session_destroy();
redirect('../client/login.html');

