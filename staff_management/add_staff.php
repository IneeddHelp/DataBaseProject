
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
    addToTable($conn, "librarian", $dataArr, "issiii");

}

?>

<!DOCTYPE html>

<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Add Staff</title>
</head>
<body>

    <?php include '../imports/dropdown.php'; ?>

    <h1>Add a New Staff member</h1>
    <form action="add_staff.php" method="post">
        <label for="ssn">SSN:</label><br>
        <input type="number" id="ssn" name="ssn" min="0" max="999999999" required><br>
        <label for="Fname">FirstName:</label><br>
        <input type="text" id="Fname" name="Fname" required><br>
        <label for="Lname">Last Name:</label><br>
        <input type="text" id="Lname" name="Lname" required><br>
        <label for="EmpID">Employee ID:</label><br>
        <input type="number" id="EmpID" name="EmpID" min="0" max="9999999999" required><br>
        <label for="SupervisorID">Supervisor ID:</label><br>
        <input type="number" id="SupervisorID" name="SupervisorID" min="0" max="9999999999"><br>
        <label for="salary">Salary:</label><br>
        <input type="number" id="salary" name="salary" min="0" max="999999"><br>
        <input type="submit" value="Submit">
    </form>


</body>
</html>
