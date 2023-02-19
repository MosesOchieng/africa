<!DOCTYPE html>
<html>
  <head>
    <title>Welcome</title>
    <style>
      body {
        background-color: #f5f5f5;
        text-align: center;
      }

      h1 {
        font-size: 60px;
        color: #4CAF50;
        margin-top: 200px;
        animation: fadein 3s;
        animation-fill-mode: both;
      }

      @keyframes fadein {
        from {
          opacity: 0;
        }
        to {
          opacity: 1;
        }
      }
      
    </style>
  </head>

  <body>
    <h1>Welcome, <?php echo $username; ?>!</h1>
    <script>
      setTimeout(function () {
        window.location.href = "index.php";
      }, 10000);
    </script>
  </body>
</html>
