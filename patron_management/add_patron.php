<?php
 include '../imports/database.php';


 if($_SERVER["REQUEST_METHOD"] == "POST"){
     $isPost = true;
     if(count($_POST) > 0){
        $dataArr = [$_POST['ssn'], $_POST['fname'], $_POST['lname'], $_POST['libId'], $_POST['addr'], $_POST['user'], $_POST['pass']];
        addToTable($conn, "patron", $dataArr, "ississs"); 
     }

 }

?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <?php include '../imports/dropdown.php'; ?>
    <title>Add Patron</title>
</head>

<body>
    <h1> Add Patron</title>

    <form action="add_patron.php" method="post">
        <label for="ssn">SSN:</label><br>
        <input type="number" id="ssn" name="ssn" required><br>
        <label for="fname">First Name:</label><br>
        <input type="text" id="fname" name="fname" required><br>
        <label for="lname">Last Name:</label><br>
        <input type="text" id="lname" name="lname" required><br>
        <label for="libId">Library ID Number:</label><br>
        <input type="number" id="libId" name="libId" required><br>
        <label for="addr">Address:</label><br>
        <input type="text" id="addr" name="addr" required><br>
        <label for="user">Username:</label><br>
        <input type="text" id="user" name="user" required><br>
        <label for="pass">Password:</label><br>
        <input type="text" id="pass" name="pass" required><br>
        <input type="submit" value="Submit">
    </form>

</body>

</html>