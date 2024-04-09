<?php
    include '../imports/database.php';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $dataArr = [
            $_POST["name"],
            $_POST["num"],
            $_POST["mgrssn"],
        ];
        updateTableArr($conn, "department", "Dnumber", $_POST["num"], ["Dname", "Dnumber", "Mgr_ssn"], $dataArr);
        header("Location: modify_dept.php");
        die;
    }else{
        $dNum = $_GET["dnum"];
        $row = selectFromTable($conn, "department", ["Dnumber"], [$dNum])[0];
    }
    

?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Modify Department</title>
    <?php include '../imports/dropdown.php'; ?>
</head>
<body>
    <form action="modify_dept_form.php" method="post">
        <h1>Modify Department</h1>
        <label for="name">Dept. Name:</label><br>
        <input type="text" id="name" name="name" value="<?= $row[0] ?>" required><br>
        <label for="num">Dept. Number:</label><br>
        <input type="number" id="num" name="num" value="<?= $row[1] ?>" required><br>
        <label for="mgrssn">Manager SSN:</label><br>
        <input type="number" id="mgrssn" name="mgrssn" value="<?= $row[2] ?>" required><br>
        <input type="submit" value="Submit">
    </form>

</body>
</html>