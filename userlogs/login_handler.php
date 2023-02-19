<?php
  // Connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "Africashop";

  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Handle form submission
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Query the database to check if the user exists
    $sql = "SELECT * FROM adminlogin WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
      // Verify the password
      $row = $result->fetch_assoc();
      if (password_verify($password, $row["password"])) {
        // Password is correct, redirect to welcome page
        header("Location: welcome.php");
        exit();
      } else {
        // Password is incorrect
        echo "Incorrect password!";
      }
    } else {
      // User does not exist
      echo "No user found with that email!";
    }
  }

  // Close the database connection
  $conn->close();
?>