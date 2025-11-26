<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Business Properties</title>
</head>
<body>

<h1>Search Business Properties</h1>

<form method="GET">
    Min Price: <input type="number" name="min_price"><br>
    Max Price: <input type="number" name="max_price"><br>
    Type: <input type="text" name="type"><br>
    <input type="submit" value="Search">
</form>

<?php

?>

</body>
</html>
