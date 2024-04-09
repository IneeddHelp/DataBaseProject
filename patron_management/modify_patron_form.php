

<?php
    include "../imports/database.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $dataArr = [
            $_POST["ssn"],
            $_POST["fname"],
            $_POST["lname"],
            $_POST["libId"],
            $_POST["addr"],
            $_POST["user"],
            $_POST["pass"]
        ];
        updateTableArr($conn, "patron", "ssn", $_POST["oldssn"], ["SSN", "Fname", "Lname", "LibraryID", "Address", "Username", "Password"], $dataArr);
        header("Location: modify_patron.php");
        die;
    }
    else if($_SERVER["REQUEST_METHOD"] == "GET"){
        $ssn = $_GET["ssn"];
        $row = selectFromTable($conn, "patron", ["ssn"], [$ssn])[0];
        
    }
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Modify Patron</title>
</head>
<body>

    <?php include '../imports/dropdown.php'; ?>

    <h1>Modify</h1>
    <form action="modify_patron_form.php" method="post">
        <label for="ssn">SSN:</label><br>
        <input type="number" id="ssn" name="ssn" min="0" max="999999999" value="<?= $row[0] ?>" required><br>
        <label for="fname">FirstName:</label><br>
        <input type="text" id="fname" name="fname" value="<?= $row[1] ?>" required><br>
        <label for="lname">Last Name:</label><br>
        <input type="text" id="lname" name="lname" value="<?= $row[2] ?>" required><br>
        <label for="libId">Library ID:</label><br>
        <input type="number" id="libId" name="libId" min="0" max="9999999999" value="<?= $row[3] ?>" required><br>
        <label for="addr">Address:</label><br>
        <input type="text" id="addr" name="addr" min="0" value="<?= $row[4] ?>" max="9999999999"><br>
        <label for="user">Username:</label><br>
        <input type="text" id="user" name="user" value="<?= $row[5] ?>"><br>
        <label for="pass">Password:</label><br>
        <input type="text" id="pass" name="pass" value="<?= $row[6] ?>"><br>
        <input type="hidden" value="<?= $row[0] ?>" name="oldssn">
        <input type="submit" value="Submit">
    </form>


</body>
</html>