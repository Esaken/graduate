<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

?>

<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kamukunji  Shop</title>

 

    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="css/foundation.css" />

   <!-- footer bootstrap -->
   <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

   <!-- homepage css -->
   <link href="css/homepage.css" rel="stylesheet">
   <!-- search bar -->
   <link href="css/search-bar.css" rel="stylesheet">
    
  </head>
  <body>

    <nav class="top-bar" data-topbar role="navigation" >
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">Kamukunji  Shop</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section" >
      <!-- Right Nav Section -->
        <ul class="right">
          <li><a href="about.php">About</a></li>
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

  
 
 <?php include 'homepage.php'; ?>




        </br>
        <!-- video -->
    <div style="position: relative; overflow: hidden; padding-top: 56.25%;"><iframe src="https://share.synthesia.io/embeds/videos/fe42cde4-3047-4570-9538-5d151037be56" loading="lazy" title="Synthesia video player - Your AI video" allow="encrypted-media; fullscreen;" style="position: absolute; width: 48%; height: 48%; top: 1vh; left: 0; border: none; padding: 0; margin: 0; overflow:hidden;"></iframe></div>




      <!-- call chatbot.php -->
 
      <button> <a href="http://127.0.0.1:5000">chatbot</button>
<!-- 
<div id="chatbox"></div>
  <div>
    <input type="text" id="usermsg" placeholder="Type message here..." />
    <button id="sendbtn" onclick="sendMsg()">Send</button>
  </div>
 -->


<?php include 'assets/footer.php'; ?>

    

    <!-- <div class="row" style="margin-top:10px;">
      <div class="small-12">

        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;">&copy; Kennedy Esau. All Rights Reserved.</p>
        </footer>

      </div>
    </div> -->



    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/chatbot.js"></script>
    <script src="js/vendor/modernizr.js"></script>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>



  </body>
</html>
