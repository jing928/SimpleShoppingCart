<?php
$user = $_POST['user'];
$pwd = $_POST['pwd'];
$record = $user . ',' . $pwd;

$file = fopen('../database/users.txt', 'r');
$exist = 0;
while (!feof($file)) {
    $line = trim(fgets($file));
    if ($line == $record) {
        $exist = 1;
        break;
    }
}

fclose($file);
if ($exist == 1) {
    echo '<p>The user already exists.</p>';
} else {
    $file = fopen('../database/users.txt', 'a');
    fwrite($file, $record . "\n");
    fclose($file);
    echo nl2br('Registration successful!');
}
