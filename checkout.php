<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

?>

<?php
// include database connection
include 'config.php';



// get cart contents from session
$cart = $_SESSION['cart'];

// calculate total price
$total_price = 0;
foreach ($cart as $product) {
    $total_price += $product['price'] * $product['qty'];
}

// insert order into database
foreach ($cart as $product) {
    $stmt = $pdo->prepare('INSERT INTO orders (product_code, product_name, product_desc, price, units, total, email) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$product['product_code'], $product['product_name'], $product['product_desc'], $product['price'], $product['qty'], $product['price'] * $product['qty'], $user_email]);
}

// clear cart
$_SESSION['cart'] = [];

?>

<!DOCTYPE html>
<html>
<head>
        <!-- Custom StyleSheet -->
        <link href="/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <link rel="stylesheet" href="css/foundation.css" />
        <link rel="stylesheet" href="css/main.css" />
    <title>Checkout</title>
</head>
<body>
<nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">Kamukunji  Shop</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
          <li><a href="about.php">About</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="cart.php">View Cart</a></li>
          <li><a href="orders.php">My Orders</a></li>
          <li><a href="contact.php">Contact</a></li>
    </ul>
    </section>



<div>
    <ul> .</ul>
    <ul> .</ul>
    <ul> .</ul>
</div>


<h4 class="mb-3">Payment</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" for="credit">Credit card</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="debit">Debit card</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="paypal">Cash On Delivery</label>
            </div>
          </div>





          <div class="paragraph">
    <p>Your order total was <?php echo $total_price; ?>.</p>
</div>


</body>
</html>
