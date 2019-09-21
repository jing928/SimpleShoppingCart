<?php require 'utils.php';

$user = $_POST['user'];
$pwd = $_POST['pwd'];
$record = $user . ',' . $pwd;

if (!user_exists($user)) {
    echo '<p>Incorrect Username.</p><br>';
    echo '<a href="../client/login.html">Try Again.</a>';
} elseif (verify_login($record)) {
    echo '<p>Login Successful!</p>';
    # TODO need to redirect to shopping cart
} else {
    echo '<p>Incorrent Password.</p><br>';
    echo '<a href="../client/login.html">Try Again.</a>';
}
