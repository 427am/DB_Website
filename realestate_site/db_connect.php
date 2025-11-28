<?php
$connection = new mysqli(
    "127.0.0.1",
    "root",
    "root",
    "realestate",
    8889
);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>