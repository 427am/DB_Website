<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Manual SQL Query</title>
</head>
<body>

<h1>Manual SQL Query</h1>

<form method="POST">
    <textarea name="sql" rows="5" cols="80" placeholder="Type a SELECT query here"></textarea><br>
    <input type="submit" value="Run Query">
</form>

<?php
if (!empty($_POST['sql'])) {
    $sql = trim($_POST['sql']);

    // Simple safety check: only allow SELECT queries
    if (stripos($sql, 'select') === 0) {
        $result = $connection->query($sql);

        if ($result && $result->num_rows > 0) {
            echo "<h2>Results</h2>";
            echo "<table border='1'><tr>";

            // header row
            $fields = $result->fetch_fields();
            foreach ($fields as $field) {
                echo "<th>{$field->name}</th>";
            }
            echo "</tr>";

            // data rows
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>" . htmlspecialchars($value) . "</td>";
                }
                echo "</tr>";
            }

            echo "</table>";
        } elseif ($result) {
            echo "<p>No rows returned.</p>";
        } else {
            echo "<p>Error running query: " . $connection->error . "</p>";
        }
    } else {
        echo "<p>Only SELECT queries are allowed.</p>";
    }
}
?>

</body>
</html>
