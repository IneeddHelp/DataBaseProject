<?php
session_start();
$username = $_SESSION["username"];
$password = $_SESSION["password"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Successful</title>
    <!-- Your existing CSS here -->
</head>
<body>

    <?php include '../imports/dropdown.php'; ?>

    <div class="container">
        <h2>Login Successful</h2>
        <p>Username: <?php echo htmlspecialchars($username); ?></p>
        <p>Password: <?php echo htmlspecialchars($password); ?></p>
        <button onclick="window.location.href='../Homepage.php'">Return to Homepage</button>
    </div>
</body>
</html>