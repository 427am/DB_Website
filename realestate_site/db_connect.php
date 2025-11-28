//MADDY AND ISABELLA

<?php

$connection = new mysqli("127.0.0.1", "root", "", "realestate", 3306);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>