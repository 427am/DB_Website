<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Real Estate MLS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Real Estate MLS</h1>
    <ul>
        <li><a href="listings.php">View Listings</a></li>
        <li><a href="search_houses.php">Search Houses</a></li>
        <li><a href="search_business.php">Search Business Properties</a></li>
        <li><a href="agents.php">View Agents</a></li>
        <li><a href="buyers.php">View Buyers</a></li>
        <li><a href="manual_query.php">Manual SQL Query</a></li>
    </ul>
</body>
</html>