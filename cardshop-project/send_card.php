<!DOCTYPE html>
<html>
<head>
    <title>Send Card</title>
</head>
<body>
<h2>Send Card</h2>

<?php
global $connection;
require 'connection.php';

if (isset($_GET['card_id'])) {
    $cardId = $_GET['card_id'];

    $query = "SELECT * FROM cards WHERE id = $cardId";
    $result = mysqli_query($connection, $query);
    $card = mysqli_fetch_assoc($result);

    if ($card) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $recipient = $_POST['recipient'];
            $email = $_POST['email'];
            $description = $_POST['description'];

            $query = "INSERT INTO sent_cards (recipient, address, description, card_id)
                          VALUES ('$recipient', '$email', '$description', $cardId)";

            if (mysqli_query($connection, $query)) {
                echo "Card sent successfully!<br>";

                $updateQuery = "UPDATE cards SET sent_count = sent_count + 1 WHERE id = $cardId";
                mysqli_query($connection, $updateQuery);
            } else {
                echo "Error: " . mysqli_error($connection);
            }

            mysqli_close($connection);
        }
        ?>

        <form method="post" action="save_sending.php">
            <label for="recipient">Recipient:</label>
            <input type="text" name="recipient" id="recipient" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required><br>

            <label for="description">Description:</label>
            <textarea name="description" id="description" required></textarea><br>
            <input type="hidden" name="card_id" value="<?php echo $cardId ?>">

            <input type="submit" value="Send Card">
        </form>

        <?php
    } else {
        echo "Card not found.";
    }

    mysqli_close($connection);
} else {
    echo "Invalid card ID.";
}
?>
</body>
<br>
<a href='home.php'>Go home</a>
</html>
