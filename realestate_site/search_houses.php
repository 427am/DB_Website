<?php
include 'db_connect.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Houses</title>
</head>
<body>

<h1>Search Houses</h1>

<form method="GET">
    Min Price: <input type="number" name="min_price"><br>
    Max Price: <input type="number" name="max_price"><br>
    Bedrooms: <input type="number" name="bedrooms"><br>
    Bathrooms: <input type="number" name="bathrooms"><br>
    <input type="submit" value="Search">
</form>

<?php
if (!empty($_GET)) {

    // Base query – always valid
    $sql = "
        SELECT 
            P.address,
            P.ownerName,
            P.price,
            H.bedrooms,
            H.bathrooms,
            H.size
        FROM House H
        JOIN Property P ON H.address = P.address
        WHERE 1 = 1
    ";

    // Add conditions only if user filled fields
    if ($_GET['min_price'] !== '' && $_GET['min_price'] !== null) {
        $min = (int)$_GET['min_price'];
        $sql .= " AND P.price >= $min";
    }

    if ($_GET['max_price'] !== '' && $_GET['max_price'] !== null) {
        $max = (int)$_GET['max_price'];
        $sql .= " AND P.price <= $max";
    }

    if ($_GET['bedrooms'] !== '' && $_GET['bedrooms'] !== null) {
        $b = (int)$_GET['bedrooms'];
        $sql .= " AND H.bedrooms = $b";
    }

    if ($_GET['bathrooms'] !== '' && $_GET['bathrooms'] !== null) {
        $baths = (int)$_GET['bathrooms'];
        $sql .= " AND H.bathrooms = $baths";
    }

    // Run the query
    $result = $connection->query($sql);

    if ($result === false) {
        echo "<p>Error: " . $connection->error . "</p>";
    } elseif ($result->num_rows > 0) {
        echo "<h2>Results</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Address</th>
                    <th>Owner</th>
                    <th>Price</th>
                    <th>Bedrooms</th>
                    <th>Bathrooms</th>
                    <th>Size (sq ft)</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['address']}</td>
                    <td>{$row['ownerName']}</td>
                    <td>{$row['price']}</td>
                    <td>{$row['bedrooms']}</td>
                    <td>{$row['bathrooms']}</td>
                    <td>{$row['size']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No houses match your search.</p>";
    }
}
?>

<p><a href="index.php">Back to Home</a></p>
</body>
</html>
