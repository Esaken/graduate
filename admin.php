<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  header("location:index.php");
}

if($_SESSION["type"]!="admin") {
  header("location:index.php");
}

include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kamukunji  Shop</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <!-- Latest compiled and minified Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

	<!-- custom css -->
	<style>
	.m-r-1em{ margin-right:1em; }
	.m-b-1em{ margin-bottom:1em; }
	.m-l-1em{ margin-left:1em; }
	.mt0{ margin-top:0; }
	</style>
  
    <script src="js/vendor/modernizr.js"></script>
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


    
        <h3>Hey Admin!</h3>
       

<!--  body-->
 <!-- container -->
 <div class="container">
        <div class="page-header">
            <h1>Read Products</h1>
        </div>
        <!-- PHP code to read records will be here -->
        <?php
// include database connection
include 'config.php';

// PAGINATION VARIABLES
// page is the current page, if there's nothing set, default is page 1
$page = isset($_GET['page']) ? $_GET['page'] : 1;
// set records or rows of data per page
$records_per_page = 5;
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;

// delete message prompt will be here
$action = isset($_GET['action']) ? $_GET['action'] : "";
// if it was redirected from delete.php
if($action=='deleted'){
	echo "<div class='alert alert-success'>Record was deleted.</div>";
}


// select all data
                // $query = "SELECT id, name, description, price FROM products ORDER BY id DESC";
                // $stmt = $con->prepare($query);
                // $stmt->execute();

        //pagination
    // select data for current page
$query = "SELECT id, name, description, price FROM products ORDER BY id DESC
LIMIT :from_record_num, :records_per_page";
$stmt = $con->prepare($query);
$stmt->bindParam(":from_record_num", $from_record_num, PDO::PARAM_INT);
$stmt->bindParam(":records_per_page", $records_per_page, PDO::PARAM_INT);
$stmt->execute();


// this is how to get number of rows returned
$num = $stmt->rowCount();
// link to create record form
echo "<a href='create.php' class='btn btn-primary m-b-1em'>Create New Product</a>";
//check if more than 0 record found
if($num>0){
	// data from database will be here
//start table
echo "<table class='table table-hover table-responsive table-bordered'>";
	//creating our table heading
	echo "<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Description</th>
		<th>Price</th>
		<th>Action</th>
	</tr>";
	// table body will be here
   // retrieve our table contents
// fetch() is faster than fetchAll()
// http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	// extract row
	// this will make $row['firstname'] to
	// just $firstname only
	extract($row);
	// creating new table row per record
	echo "<tr>
		<td>{$id}</td>
		<td>{$name}</td>
		<td>{$description}</td>
		<td>{$price}</td>
		<td>";
			// read one record
			echo "<a href='read_one.php?id={$id}' class='btn btn-info m-r-1em'>Read</a>";
			// we will use this links on next part of this post
			echo "<a href='update.php?id={$id}' class='btn btn-primary m-r-1em'>Edit</a>";
			// we will use this links on next part of this post
			echo "<a href='#' onclick='delete_user({$id});'  class='btn btn-danger'>Delete</a>";
		echo "</td>";
	echo "</tr>";
}


// PAGINATION
// count total number of rows
$query = "SELECT COUNT(*) as total_rows FROM products";
$stmt = $con->prepare($query);
// execute query
$stmt->execute();
// get total rows
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$total_rows = $row['total_rows'];


// paginate records
$page_url="admin.php?";
include_once "paging.php";

// end table
echo "</table>";

}
// if no records found
else{
	echo "<div class='alert alert-danger'>No records found.</div>";
}
?>
    </div> <!-- end .container -->
<!--  body-->



     
   
<a href='sql/users-report.php' class='btn btn-primary m-b-1em'>Show all users</a>
<a href='sql/products-report.php' class='btn btn-primary m-b-1em'>All products</a>
<a href='sql/cart-report.php' class='btn btn-primary m-b-1em'>CART report</a>

    
        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;">&copy; Kennedy Esau. All Rights Reserved.</p>
        </footer>

      </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <!-- confirm delete record will be here -->
<script type='text/javascript'>
// confirm record deletion
function delete_user( id ){
	var answer = confirm('Are you sure?');
	if (answer){
		// if user clicked ok,
		// pass the id to delete.php and execute the delete query
		window.location = 'delete.php?id=' + id;
	}
}
</script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
