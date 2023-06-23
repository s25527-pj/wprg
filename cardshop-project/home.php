<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
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
<?php
$loggedIn = false;
if (isset($_COOKIE['username'])) {
    $loggedIn = true;
}
if (isset($_COOKIE['role']) && $_COOKIE['role'] === 'admin') {
    echo "<a href='logs.php'>Logs</a>";
    echo "<br>";
}
if ($loggedIn) {
    echo "\nlogged in as: ";
    echo $_COOKIE['username'];
    echo "<a href='logout.php'>Logout</a>";
    echo "<br>";
    echo "<a href='add_card.php'>Add Card</a>";
} else {
    echo "<a href='login.php'>Log in</a>";
}
?>

<h2>Card List</h2>
<form method="GET" action="">
    <label for="tagFilter">Filter by Tag:</label>
    <select id="tagFilter" name="tag">
        <option value="">All</option>
        <?php
        global $connection;
        require 'connection.php';
        $query = "SELECT DISTINCT tag FROM cards";
        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $tag = $row['tag'];
                echo "<option value='$tag'>$tag</option>";
            }
        }

        mysqli_close($connection);
        ?>
    </select>
    <input type="submit" value="Filter">
</form>

<?php
global $connection;
require 'connection.php';

$filterTag = isset($_GET['tag']) ? $_GET['tag'] : '';
$query = "SELECT * FROM cards";
if (!empty($filterTag)) {
    $filterTag = mysqli_real_escape_string($connection, $filterTag);
    $query .= " WHERE tag = '$filterTag'";
}
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $cardId = $row['id'];
        $image = $row['image'];

        echo "<div class='card'>";
        echo "<img src='$image'><br>";
        echo "<a href='send_card.php?card_id=$cardId'>Send Card</a>";
//        echo "<a href='send_card.php' onclick='setCardId($cardId);'>Send Card</a>";

        if ($loggedIn) {
            echo "<a href='remove_card.php?card_id=$cardId'>Remove Card</a>";
            echo "<a href='rate_card.php?card_id=$cardId'>Rate Card</a>";
        }

        echo "</div>";
    }
} else {
    echo "No cards found.";
}

mysqli_close($connection);
?>

</body>
</html>
