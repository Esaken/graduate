<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

if(session_id() == '' || !isset($_SESSION)){session_start();}


?>

<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us || Kamukunji  Shop</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">Kamukunji Shop</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
          <li class="active"><a href="about.php">About</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="cart.php">View Cart</a></li>
          <li><a href="orders.php">My Orders</a></li>
          <li><a href="contact.php">Contact</a></li>
          <?php
    
          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>




    <div class="row" style="margin-top:30px;">
      <div class="small-12">

        <div>
        Welcome to Kamukunji Shop, a premier online retailer that specializes in selling shoes. Our mission is to provide high-quality footwear at affordable prices to our customers around the world. We offer a wide selection of shoes for men, women, and children, including sneakers, boots, sandals, and more
        </div>
        <div>
        At Kamukunji Shop, we believe that everyone deserves to have access to stylish and comfortable footwear that fits their lifestyle and budget. That's why we work hard to source the best products from trusted brands and manufacturers. Our team is dedicated to providing exceptional customer service and ensuring that every purchase meets our customers' expectations
        </div>
        <div>
        Whether you're looking for a new pair of running shoes, casual sneakers, or dress shoes for a special occasion, Kamukunji Shop has you covered. We invite you to browse our website and discover our range of shoes, as well as our competitive prices and fast shipping. Thank you for choosing Kamukunji Shop as your go-to destination for all your footwear needs.
        </div>




<!-- sneakers -->
<?php include 'assets/sneakers.php';?>







        <footer>
           <p style="text-align:center; font-size:0.8em;">&copy; Kennedy Esau. All Rights Reserved.</p>
        </footer>

      </div>
    </div>







    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
