<!DOCTYPE html>
<html>
<head>
    <title>Add Rating</title>
</head>
<body>
<h2>Add Rating</h2>

<?php
global $connection;
require 'connection.php';

if (isset($_GET['card_id'])) {
    $cardId = $_GET['card_id'];

    ?>

    <form method="post" action="save_rating.php">
        <label for="rating">Rating:</label>
        <select name="rating" id="rating" required>
            <?php
            for ($i = 1; $i <= 10; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select><br>
        <input type="hidden" name="card_id" value="<?php echo $cardId ?>">
        <input type="submit" value="Submit">
    </form>

    <?php
} else {
    echo "Invalid card ID.";
}
?>
</body>
<br>
<a href='home.php'>Go home</a>
</html>
