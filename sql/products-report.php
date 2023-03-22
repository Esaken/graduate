<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr>
        <th>Id</th>
        <th>name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Created</th>
        <th>Modified</th>
    </tr>";


class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
      parent::__construct($it, self::LEAVES_ONLY);
    }
  
    function current() {
      return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }
  
    function beginChildren() {
      echo "<tr>";
    }
  
    function endChildren() {
      echo "</tr>" . "\n";
    }
  }
  

  $db_username = 'root';
  $db_password = '';
  $db_name = 'k_shop';
  $db_host = 'localhost';


  try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, name, description, price, created, modified FROM products");
    $stmt->execute();

      // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
  }
    } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
    $conn = null;
    echo "</table>";







?>