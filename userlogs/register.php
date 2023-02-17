<?php
session_start();
include('db.php');

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    $result = mysqli_query($con, $query);

    if ($result) {
        $_SESSION['success'] = "Registration successful.";
        header("Location: login.php");
    } else {
        $_SESSION['error'] = "Registration failed.";
        header("Location: register.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <h1>Registration</h1>

    <?php if (isset($_SESSION['error'])) { ?>
        <p><?php echo $_SESSION['error']; ?></p>
        <?php unset($_SESSION['error']); ?>
    <?php } ?>

    <form method="post" action="register.php">
        <label>Username:</label>
        <input type="text" name="username"><br><br>
        <label>Password:</label>
        <input type="password" name="password"><br><br>
        <input type="submit" name="register" value="Register">
    </form>
</body>
</html>
