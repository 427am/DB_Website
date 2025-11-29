<?php
include 'db_connect.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Business Properties</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Search Business Properties</h1>

<form method="GET">
    Min Price: <input type="number" name="min_price"><br>
    Max Price: <input type="number" name="max_price"><br>
    Type: <input type="text" name="type"><br>
    Min Size (sq ft): <input type="number" name="min_size"><br>
    Max Size (sq ft): <input type="number" name="max_size"><br>
    <input type="submit" value="Search">
</form>

<?php
if (!empty($_GET)) {

    $sql = "
        SELECT 
            P.address,
            P.ownerName,
            P.price,
            B.type,
            B.size
        FROM BusinessProperty B
        JOIN Property P ON B.address = P.address
        WHERE 1 = 1
    ";

    if ($_GET['min_price'] !== '' && $_GET['min_price'] !== null) {
        $min = (int)$_GET['min_price'];
        $sql .= " AND P.price >= $min";
    }

    if ($_GET['max_price'] !== '' && $_GET['max_price'] !== null) {
        $max = (int)$_GET['max_price'];
        $sql .= " AND P.price <= $max";
    }

    if ($_GET['min_size'] !== '' && $_GET['min_size'] !== null) {
        $minSize = (int)$_GET['min_size'];
        $sql .= " AND B.size >= $minSize";
    }

    if ($_GET['max_size'] !== '' && $_GET['max_size'] !== null) {
        $maxSize = (int)$_GET['max_size'];
        $sql .= " AND B.size <= $maxSize";
    }

    if ($_GET['type'] !== '' && $_GET['type'] !== null) {
        $type = $connection->real_escape_string($_GET['type']);
        // exact match; you could also do LIKE '%$type%'
        $sql .= " AND B.type = '$type'";
    }

    if ($_GET['min_size'] !== '' && $_GET['min_size'] !== null) {
        $minS = (int)$_GET['min_size'];
        $sql .= " AND B.size >= $minS";
    }

    if ($_GET['max_size'] !== '' && $_GET['max_size'] !== null) {
        $maxS = (int)$_GET['max_size'];
        $sql .= " AND B.size <= $maxS";
    }

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
                    <th>Type</th>
                    <th>Size (sq ft)</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['address']}</td>
                    <td>{$row['ownerName']}</td>
                    <td>{$row['price']}</td>
                    <td>{$row['type']}</td>
                    <td>{$row['size']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No business properties match your search.</p>";
    }
}
?>

<p><a href="index.php">Back to Home</a></p>
</body>
</html>
