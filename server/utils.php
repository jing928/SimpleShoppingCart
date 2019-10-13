<?php require 'crypto/rsa.php';

function user_exists($user)
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

function verify_login($record)
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

function generate_initial_cart($username)
{
    $file = fopen("../database/cart/{$username}.txt", 'w+');
    $content = 'Apple:1.99:0,Banana:0.99:0,Carrot:0.49:0';
    fwrite($file, $content . "\n");
    fclose($file);
}

function get_cart_content($user)
{
    $file = fopen("../database/cart/{$user}.txt", 'r');
    return trim(fgets($file));
}

function save_cart_content($user, $content)
{
    $file = fopen("../database/cart/{$user}.txt", 'w');
    fwrite($file, $content);
    fclose($file);
}

function save_credit_card($user, $card_number)
{
    $file = fopen("../database/credit_card/{$user}.txt", 'w+');
    fwrite($file, $card_number);
    fclose($file);
}

function get_credit_card($user)
{
    $path = "../database/credit_card/{$user}.txt";
    if (file_exists($path)) {
        $file = fopen($path, 'r');
        return trim(fgets($file));
    } else {
        return "";
    }
}

function rsa_decrypt($ciphertext)
{
    $private_key = get_rsa_privatekey('./crypto/private.key');
    return rsa_decryption($ciphertext, $private_key);
}

function redirect($path)
{
    header('Location: ' . $path);
    exit();
}
