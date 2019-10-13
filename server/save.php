<?php session_start();
require 'crypto/des.php';
require 'utils.php';

if (!isset($_SESSION['user'])) {
    redirect('../client/login.html');
}

$key = rsa_decrypt($_POST['key']);
$user = $_SESSION['user'];

$content = php_des_decryption($key, $_POST['content']);
$credit_card = php_des_decryption($key, $_POST['cc']);

save_cart_content($user, $content);
save_credit_card($user, $credit_card);

echo "
    <h1>Thank you!</h1>
    <h2>Your shopping cart and credit card have been saved!</h2>
    <p>The following is your order confirmation:</p>
";

$products = explode(',', $content);
echo "
<table>
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Subtotal</th>
    </tr>
    ";
$index = 0;
$num_of_products = count($products);
$total_q = 0;
$total_p = 0;
foreach ($products as $product) {
    list($name, $price, $quantity) = explode(':', $product);
    $subtotal = $price * $quantity;
    echo "
    <tr>
        <td>{$name}</td>
        <td>{$price}</td>
        <td>{$quantity}</td>
        <td>{$subtotal}</td>
    </tr>
    ";
    $index++;
    $total_q += $quantity;
    $total_p += $price * $quantity;
}
echo "
    <tr>
        <td>Total</td>
        <td></td>
        <td>{$total_q}</td>
        <td>{$total_p}</td>
    </tr>
</table>";

echo "
<p>You may logout now.</p>
<button onclick='logout()'>Logout</button>
"
?>

<script>
    function logout() {
        location.href = './logout.php';
    }
</script>
