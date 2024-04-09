<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  // TODO: Use $username and $password to query your database and verify the login

  // If login is successful, store username and password in session and redirect to login_success.php
  $_SESSION["username"] = $username;
  $_SESSION["password"] = $password;
  header("Location: login_success.php");
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Login Page</title>
    
</head>
<body>

    <?php include '../imports/dropdown.php'; ?>
    
    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>
            <button type="submit" id="loginButton">Login</button>
            <script>
                document.getElementById("loginButton").addEventListener("click", function() {
                    
                    if(document.getElementById("username").value == "" || document.getElementById("password").value == ""){
                        alert("Please enter a username and password");
                        return;
                    }

                });
                    
            
            </script>
        </form>
    </div>
</body>
</html>