<?php
$currency = 'Ksh. ';
$db_username = 'root';
$db_password = '';
$db_name = 'k_shop';
$db_host = 'localhost';
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);


try {
    $con = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_username, $db_password);
}
// show error
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
?>
