<?php
global $connection;
require 'connection.php';

$recipient = $_POST['recipient'];
$email = $_POST['email'];
$description = $_POST['description'];
$cardId = $_POST['card_id'];

$query = "SELECT * FROM cards WHERE id = $cardId";
$result = mysqli_query($connection, $query);
$card = mysqli_fetch_assoc($result);

if ($card) {

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