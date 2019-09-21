<?php
function user_exists(string $user): bool
{
    $file = fopen('../database/users.txt', 'r');
    $exist = false;
    while (!feof($file)) {
        $line = trim(fgets($file));
        $saved_user = explode(',', $line)[0];
        if ($saved_user == $user) {
            $exist = true;
            break;
        }
    }
    fclose($file);
    return $exist;
}

function verify_login(string $record): bool
{
    $file = fopen('../database/users.txt', 'r');
    $match = false;
    while (!feof($file)) {
        $line = trim(fgets($file));
        if ($line == $record) {
            $match = true;
            break;
        }
    }

    fclose($file);
    return $match;
}
