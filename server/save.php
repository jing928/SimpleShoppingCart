<?php session_start();
require 'crypto/des.php';
require 'utils.php';

$key = $_SESSION['key'];
$user = $_SESSION['user'];

$content = php_des_decryption($key, $_POST['content']);
$credit_card = php_des_decryption($key, $_POST['cc']);

save_cart_content($user, $content);
save_credit_card($user, $credit_card);

