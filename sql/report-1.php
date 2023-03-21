<?php 
include '../config.php';







// Run the query and store the result
$sql = "SELECT * FROM products;";


// Display the results in an HTML table
if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th><th>Description</th><th>Price</th></tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["description"]."</td><td>".$row["price"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}











?>