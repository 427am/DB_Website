<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Agents</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Agents</h1>

<?php
$sql = "
    SELECT 
        A.agentId,
        A.name AS agentName,
        A.phone,
        A.dateStarted,
        F.name AS firmName,
        F.address AS firmAddress
    FROM Agent A
    JOIN Firm F ON A.firmId = F.id
    ORDER BY A.agentId
";

$result = $connection->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Agent ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Date Started</th>
                <th>Firm</th>
                <th>Firm Address</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['agentId']}</td>
                <td>{$row['agentName']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['dateStarted']}</td>
                <td>{$row['firmName']}</td>
                <td>{$row['firmAddress']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No agents found.</p>";
}
?>

</body>
</html>
