<?php
// Include the database connection file
require_once 'connection.php';

// Check if the login button was clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

    // Initialize variables
    $username = $password = "";

    // Get input data
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Prepare a select statement
    $sql = "SELECT * FROM sellers WHERE username = '$username'";

    // Execute the select statement
    $result = $conn->query($sql);

    // Check if the user exists in the database
    if ($result->num_rows == 1) {

        // Fetch the row from the result set
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row['password'])) {
            echo "Login successful";

            // Redirect to the dashboard page
            header("location: sellers.php");
            exit;
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "User does not exist. Please register.";
    }
}

// Close connection
$conn->close();
?>
