<!DOCTYPE html>
<html>
<head>
    <title>Add Card Form</title>
</head>
<body>
<h2>Add Card</h2>

<?php

global $connection;
require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $image = $_POST['image'];
    $tag = $_POST['tag'];



    $query = "INSERT INTO cards (image, rating, tag, rating_count, sent_count)
                  VALUES ('$image', 0.0, '$tag', 0, 0)";

    if (mysqli_query($connection, $query)) {
        echo "Card added successfully!";
    } else {
        echo "Error: " . mysqli_error($connection);
    }

    mysqli_close($connection);

}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="image">Image:</label>
    <input type="text" name="image" id="image" required><br>
    <label for="tag">Tag:</label>
    <input type="text" name="tag" id="tag" required><br>
    <input type="submit" value="Add Card">
    <br>
    <a href='home.php'>Go home</a>

</form>
</body>
</html>
