

<?php
    include "../imports/database.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $dataArr = [
            $_POST["ssn"],
            $_POST["Fname"],
            $_POST["Lname"],
            $_POST["EmpID"],
            $_POST["salary"],
            $_POST["SupervisorID"]
        ];
        updateTableArr($conn, "librarian", "ssn", $_POST["oldssn"], ["SSN", "Fname", "Lname", "EmployeeID", "Salary", "SupervisorID"], $dataArr);
        header("Location: modify_staff.php");
        die;
    }
    else if($_SERVER["REQUEST_METHOD"] == "GET"){
        $ssn = $_GET["ssn"];
        $row = selectFromTable($conn, "librarian", ["ssn"], [$ssn])[0];
        
    }
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Modify </title>
</head>
<body>

    <?php include '../imports/dropdown.php'; ?>

    <h1>Modify</h1>
    <form action="modify_staff_form.php" method="post">
        <label for="ssn">SSN:</label><br>
        <input type="number" id="ssn" name="ssn" min="0" max="999999999" value="<?= $row[0] ?>" required><br>
        <label for="Fname">FirstName:</label><br>
        <input type="text" id="Fname" name="Fname" value="<?= $row[1] ?>" required><br>
        <label for="Lname">Last Name:</label><br>
        <input type="text" id="Lname" name="Lname" value="<?= $row[2] ?>" required><br>
        <label for="EmpID">Employee ID:</label><br>
        <input type="number" id="EmpID" name="EmpID" min="0" max="9999999999" value="<?= $row[3] ?>" required><br>
        <label for="SupervisorID">Supervisor ID:</label><br>
        <input type="number" id="SupervisorID" name="SupervisorID" min="0" value="<?= $row[5] ?>" max="9999999999"><br>
        <label for="salary">Salary:</label><br>
        <input type="number" id="salary" name="salary" min="0" max="999999" value="<?= $row[4] ?>"><br>
        <input type="hidden" value="<?= $row[0] ?>" name="oldssn">
        <input type="submit" value="Submit">
    </form>


</body>
</html>