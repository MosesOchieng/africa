<?php
// Include the database connection file
require_once 'connection.php';

// Initialize variables
$username = $email = $password = $cfpassword = "";
$username_err = $email_err = $password_err = $cfpassword_err = "";

// Process form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM adminlogin WHERE username = ?";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter an email address.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM adminlogin WHERE email = ?";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_email);

            // Set parameters
            $param_email = trim($_POST["email"]);

                   // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect to login page
            header("location: login.php");
        } else {
            echo "Something went wrong. Please try again later.";
        }
    
        // Close statement
        $stmt->close();
    }
}

}

// Close connection
$conn->close();

?>
