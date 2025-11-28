<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Listings</title>
</head>
<body>

<h1>House Listings</h1>

<?php
// All listings that are houses
$sql = "
    SELECT 
        L.mlsNumber,
        P.address,
        P.ownerName,
        P.price,
        H.bedrooms,
        H.bathrooms,
        H.size,
        A.name AS agentName
    FROM Listing L
    JOIN Property P  ON L.address = P.address
    JOIN House H     ON H.address = P.address
    JOIN Agent A     ON L.agentId = A.agentId
    ORDER BY L.mlsNumber
";

$result = $connection->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>MLS #</th>
                <th>Address</th>
                <th>Owner</th>
                <th>Price</th>
                <th>Bedrooms</th>
                <th>Bathrooms</th>
                <th>Size (sq ft)</th>
                <th>Agent</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['mlsNumber']}</td>
                <td>{$row['address']}</td>
                <td>{$row['ownerName']}</td>
                <td>{$row['price']}</td>
                <td>{$row['bedrooms']}</td>
                <td>{$row['bathrooms']}</td>
                <td>{$row['size']}</td>
                <td>{$row['agentName']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No house listings found.</p>";
}
?>

<h1>Business Property Listings</h1>

<?php
// All listings that are business properties
$sql = "
    SELECT
        L.mlsNumber,
        P.address,
        P.ownerName,
        P.price,
        B.type,
        B.size,
        A.name AS agentName
    FROM Listing L
    JOIN Property P        ON L.address = P.address
    JOIN BusinessProperty B ON B.address = P.address
    JOIN Agent A           ON L.agentId = A.agentId
    ORDER BY L.mlsNumber
";

$result = $connection->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>MLS #</th>
                <th>Address</th>
                <th>Owner</th>
                <th>Price</th>
                <th>Business Type</th>
                <th>Size (sq ft)</th>
                <th>Agent</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['mlsNumber']}</td>
                <td>{$row['address']}</td>
                <td>{$row['ownerName']}</td>
                <td>{$row['price']}</td>
                <td>{$row['type']}</td>
                <td>{$row['size']}</td>
                <td>{$row['agentName']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No business property listings found.</p>";
}
?>

</body>
</html>

