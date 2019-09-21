<?php require 'utils.php';

$record = $user . ',' . $pwd;


if (user_exists($_POST['user'])) {
    echo '<p>The user already exists.</p><br>';
    echo '<a href="../client/register.html">Go back to Register</a><br>';
} else {
    $file = fopen('../database/users.txt', 'a');
    $record = $_POST['user'] . ',' . $_POST['pwd'];
    fwrite($file, $record . "\n");
    fclose($file);
    echo '<p>Registration successful!</p><br>';
}
echo '<a href="../client/login.html">Go to Login</a>';
