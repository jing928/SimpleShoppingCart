<?php session_start();
require 'utils.php';

if (!isset($_POST['user'])) {
    redirect('../client/login.html');
}

$user = $_POST['user'];
$pwd = $_POST['pwd'];
$record = $user . ',' . $pwd;

if (!user_exists($user)) {
    echo '<p>Incorrect Username.</p><br>';
    echo '<a href="../client/login.html">Try Again.</a>';
} elseif (verify_login($record)) {
    $_SESSION['user'] = $user;
    $cart_content = get_cart_content($user);
    $_SESSION['cart'] = $cart_content;
    redirect('../client/cart.php');
} else {
    echo '<p>Incorrect Password.</p><br>';
    echo '<a href="../client/login.html">Try Again.</a>';
}
