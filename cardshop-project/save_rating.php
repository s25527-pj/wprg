<?php
global $connection;
require 'connection.php';

$rating = $_POST['rating'];
$cardId = $_POST['card_id'];

$updateQuery = "UPDATE cards SET rating = ((rating * rating_count) + $rating) / (rating_count + 1),
rating_count = rating_count + 1 WHERE id = $cardId";

if (mysqli_query($connection, $updateQuery)) {
echo "Rating added successfully!";
} else {
echo "Error: " . mysqli_error($connection);
}

mysqli_close($connection);
?>
<a href='home.php'>Go home</a>

