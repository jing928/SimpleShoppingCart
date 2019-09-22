<?php session_start();
$user = $_SESSION['user'];
$key = $_SESSION['key'];
$cart = $_SESSION['cart'];

$products = explode(',', $cart);
echo '<h1>Hi ', $user, '! Here Is Your Shopping Cart!</h1>';

echo '
<table>
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th><label id="quant">Quantity</label></th>
        <th>Subtotal</th>
    </tr>';
$i = 0;
$total_q = 0;
$total_p = 0;
foreach ($products as $product) {
    list($name, $price, $quantity) = explode(':', $product);
    echo "
    <tr>
        <td>{$name}</td>
        <td id='p{$i}'>{$price}</td>
        <td><input id='p{$i}q' name='p{$i}q' type='number' value='{$quantity}' min='0' max='10' aria-labelledby='quant'></td>
        <td><input id='p{$i}s' name='p{$i}s' readonly value='0'></td>
    </tr>";
    $i++;
    $total_q += $quantity;
    $total_p += $price * $quantity;
}
echo "
    <tr>
        <td>Total</td>
        <td></td>
        <td id='total_q'>{$total_q}</td>
        <td id='total_p'>{$total_p}</td>
    </tr>
</table>";
?>

<script>

</script>
