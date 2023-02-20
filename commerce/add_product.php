<?php
header( "refresh:10;url= ../index.php" );
require_once 'connection.php';
// Check if the signup button was clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Initialize variables
    $name = $describe = $price = $seller = $status = "";

    // Get input data
    $name = trim($_POST["name"]);
    $describe = trim($_POST["description"]);
    $price = trim($_POST["price"]);
   


     // Insert the product into the database
    $sql = "INSERT INTO products (name, description, price)VALUES ('$name', '$describe', '$price')";
    if ($conn->query($sql) === TRUE) {
        echo "Thank you for selling with us .We will inform you when  buy drops by";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


}
// Close connection
$conn->close();
?>