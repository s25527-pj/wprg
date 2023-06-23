<!DOCTYPE html>
<html>
<head>
    <title>Logs</title>
    <style>
        .card {
            display: inline-block;
            vertical-align: top;
            margin: 10px;
            padding: 10px;
            border: 1px solid #ccc;
        }

        .card img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>
<body>
<h2>Card Statistics</h2>

<?php
global $connection;
require 'connection.php';

$query = "SELECT * FROM cards";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $image = $row['image'];
        $rating = $row['rating'];
        $tag = $row['tag'];
        $sentCount = $row['sent_count'];

        echo "<div class='card'>";
        echo "<img src='$image'><br>";
        echo "Rating: $rating<br>";
        echo "Tag: $tag<br>";
        echo "Sent Times: $sentCount<br>";
        echo "</div>";
    }
} else {
    echo "No cards found.";
}

$query = "SELECT * FROM sent_cards";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Sent Cards</h2>";
    echo "<table>";
    echo "<tr><th>Recipient</th><th>Email</th><th>Description</th><th>Card ID</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        $recipient = $row['recipient'];
        $email = $row['address'];
        $description = $row['description'];
        $cardId = $row['card_id'];

        echo "<tr>";
        echo "<td>$recipient</td>";
        echo "<td>$email</td>";
        echo "<td>$description</td>";
        echo "<td>$cardId</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No sent cards found.";
}

mysqli_close($connection);

?>
<br>
<a href='home.php'>Go home</a>
</body>
</html>
