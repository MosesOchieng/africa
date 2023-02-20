<?php

?>
<!DOCTYPE html>
<html>

<head>
  <title>Sign Up</title>
  <style>
     body {
      background-color: #f5f5f5;
      text-align: center;
    }
    form {
      display: inline-block;
      border: 2px solid #ccc;
      padding: 20px;
      border-radius: 10px;
      background-color: #fff;
      margin-top: 50px;
    }
    input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      border: none;
      padding: 10px;
      border-radius: 5px;
      cursor: pointer;
    }

  </style>
</head>

<body>
  <h2>Sign Up</h2>
  <form action="register_handler.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>
    <label for="password">Confirm Password:</label>
    <input type="password" id="password" name="cfpassword" required><br><br>
    <input type="submit" name="signup" value="Sign Up">
  </form>
</body>


</html>
