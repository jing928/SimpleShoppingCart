<?php session_start();
$user = $_SESSION['user'];
$key = $_SESSION['key'];
$cart = $_SESSION['cart'];

$products = explode(',', $cart);
echo '<h1>Hi ', $user, '! Here Is Your Shopping Cart!</h1>';

echo '
<form>
<table>
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th><label id="quant">Quantity</label></th>
        <th>Subtotal</th>
    </tr>';
$index = 0;
$num_of_products = count($products);
$total_q = 0;
$total_p = 0;
foreach ($products as $product) {
    list($name, $price, $quantity) = explode(':', $product);
    echo "
    <tr>
        <td>{$name}</td>
        <td id='p{$index}p'>{$price}</td>
        <td><input id='p{$index}q' name='p{$index}q' type='number' value='{$quantity}' min='0' max='10' 
        aria-labelledby='quant' oninput='update(\"$index\", \"$num_of_products\")'></td>
        <td><input id='p{$index}s' name='p{$index}s' readonly value='0'></td>
    </tr>";
    $index++;
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

echo '<br>';
echo "<label>Credit Card Number: <input id='cc' name='cc' type='text'></label>";
echo '<br><br>';
echo "<button id='submit' type='submit' onclick='processSubmit(\"$num_of_products\")'>Submit</button>";
echo '</form>';
?>

<script>
    function update(prodNum, numOfProds) {
        updateSubTotal(prodNum);
        updateTotal(numOfProds);
    }

    function updateSubTotal(prodNum) {
        let idBase = 'p' + prodNum;
        let priceID = idBase + 'p';
        let quantID = idBase + 'q';
        let subTotalID = idBase + 's';
        let priceValue = Number(document.getElementById(priceID).innerText);
        let quantityValue = Number(document.getElementById(quantID).value);
        document.getElementById(subTotalID).value = priceValue * quantityValue;
    }

    function updateTotal(numOfProds) {
        let totalQuant = 0;
        let totalPrice = 0;
        for (let i = 0; i < numOfProds; i++) {
            let idBase = 'p' + i;
            let quantID = idBase + 'q';
            let subTotalID = idBase + 's';
            totalQuant += Number(document.getElementById(quantID).value);
            totalPrice += Number(document.getElementById(subTotalID).value);
        }
        document.getElementById('total_q').innerHTML = totalQuant.toFixed(2).toString();
        document.getElementById('total_p').innerHTML = totalPrice.toFixed(2).toString();
    }

    function processSubmit(numOfProds) {

    }
</script>
