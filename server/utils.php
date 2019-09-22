<?php require 'crypto/rsa.php';
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

function generate_initial_cart(string $username)
{
    $file = fopen("../database/cart/{$username}.txt", 'w+');
    $content = 'Apple:1.99:0,Banana:0.99:0,Carrot:0.49:0';
    fwrite($file, $content . "\n");
    fclose($file);
}

function get_cart_content(string $user)
{
    $file = fopen("../database/cart/{$user}.txt", 'r');
    return trim(fgets($file));
}

function rsa_decrypt(string $ciphertext)
{
    $private_key = get_rsa_privatekey('./crypto/private.key');
    return rsa_decryption($ciphertext, $private_key);
}

function redirect($path)
{
    header('Location: ' . $path);
    exit();
}
