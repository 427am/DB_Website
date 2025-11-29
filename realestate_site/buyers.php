<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Buyers</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Buyers</h1>

<?php
$sql = "
    SELECT 
        B.id,
        B.name,
        B.phone,
        B.propertyType,
        B.bedrooms,
        B.bathrooms,
        B.businessPropertyType,
        B.minimumPreferredPrice,
        B.maximumPreferredPrice,
        A.name AS agentName
    FROM Buyer B
    LEFT JOIN Works_With W ON B.id = W.buyerId
    LEFT JOIN Agent A      ON W.agentId = A.agentId
    ORDER BY B.id
";

$result = $connection->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Buyer ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Property Type</th>
                <th>Bedrooms</th>
                <th>Bathrooms</th>
                <th>Business Type</th>
                <th>Min Preferred Price</th>
                <th>Max Preferred Price</th>
                <th>Agent</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['propertyType']}</td>
                <td>{$row['bedrooms']}</td>
                <td>{$row['bathrooms']}</td>
                <td>{$row['businessPropertyType']}</td>
                <td>{$row['minimumPreferredPrice']}</td>
                <td>{$row['maximumPreferredPrice']}</td>
                <td>{$row['agentName']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No buyers found.</p>";
}
?>

</body>
</html>
