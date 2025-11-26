<?php include 'db_connect.php'; ?>
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

?>

</body>
</html>
