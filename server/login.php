<?php
$user = $_POST['user'];
$pwd = $_POST['pwd'];
$record = $user . ',' . $pwd;

$file = fopen('../database/users.txt', 'r');
$match = 0;
while (!feof($file)) {
    $line = trim(fgets($file));
    if ($line == $record) {
        $match = 1;
        break;
    }
}

fclose($file);
if ($match == 1) {
    echo '<p>Login Successful!</p>';
} else {
    echo '<p>Login Failed!</p>';
}
