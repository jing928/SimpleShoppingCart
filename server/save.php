<?php session_start();
require 'crypto/des.php';
require 'utils.php';

$key = $_SESSION['key'];
$user = $_SESSION['user'];

$content = php_des_decryption($key, $_POST['content']);
$credit_card = php_des_decryption($key, $_POST['cc']);

save_cart_content($user, $content);
save_credit_card($user, $credit_card);

echo "
    <h1>Thank you!</h1>
    <h2>Your shopping cart and credit card have been saved!</h2>
    <p>You may logout now.</p>
    <button onclick='logout()'>Logout</button>
";
?>

<script>
    function logout() {
        location.href = './logout.php';
    }
</script>
