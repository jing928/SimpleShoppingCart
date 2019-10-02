<?php require 'utils.php';

if (!isset($_POST['user'])) {
    redirect('../client/login.html');
}

$user = $_POST['user'];

if (user_exists($user)) {
    echo '<p>The user already exists.</p><br>';
    echo '<a href="../client/register.html">Go back to Register</a><br>';
} else {
    $file = fopen('../database/users.txt', 'a');
    $record = $user . ',' . $_POST['pwd'];
    fwrite($file, $record . "\n");
    fclose($file);
    generate_initial_cart($user);
    echo '<p>Registration successful!</p><br>';
}
echo '<a href="../client/login.html">Go to Login</a>';
