<!DOCTYPE html>
<html>
<head>
    <title>Remove Card</title>
</head>
<body>
<h2>Remove Card</h2>

<?php
global $connection;
require 'connection.php';

if (isset($_GET['card_id'])) {
    $cardId = $_GET['card_id'];


    $query = "DELETE FROM cards WHERE id = $cardId";

    if (mysqli_query($connection, $query)) {
        echo "Card removed successfully!";
    } else {
        echo "Error: " . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="submit" value="Remove Card">
</form>
<br>
<a href='home.php'>Go home</a>
</body>
</html>
