<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $connect = mysqli_connect("localhost", "root", "", "cardshop");

    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $username = mysqli_real_escape_string($connect, $username);
    $password = mysqli_real_escape_string($connect, $password);

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];

        setcookie('username', $row['username'], 0, "/");
        setcookie('role', $row['role'], 0, "/");

        header("Location: home.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }

    mysqli_close($connect);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h1>Login</h1>
<?php if (isset($error)) { ?>
    <p><?php echo $error; ?></p>
<?php } ?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label>Username:</label>
    <input type="text" name="username" required><br><br>
    <label>Password:</label>
    <input type="password" name="password" required><br><br>
    <input type="submit" value="Log In">
</form>
<br>
<a href='home.php'>Go home</a>
</body>
</html>
