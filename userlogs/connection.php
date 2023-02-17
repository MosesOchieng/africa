<?php
$con = mysqli_connect("localhost", "root", "", "shopping_cart");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
