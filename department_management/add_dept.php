<?php
 include '../imports/database.php';


 if($_SERVER["REQUEST_METHOD"] == "POST"){
     $isPost = true;
     if(count($_POST) > 0){
        $dataArr = [$_POST['name'], $_POST['num'], $_POST['mgrssn']];
        addToTable($conn, "department", $dataArr, "sii");
     }

 }

 $query = "SELECT * FROM department";
 $result = mysqli_query($conn, $query);
 $deptArr = array();
 while($row = mysqli_fetch_assoc($result)){
     array_push($deptArr, $row);
 }

?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <?php include '../imports/dropdown.php'; ?>
    <title>Add Department</title>
</head>

<body>
    <h1> Add Department</title>


    <form action="add_dept.php" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="num">Number:</label><br>
        <input type="number" id="num" name="num" required><br>
        <label for="mgrssn">Manager SSN:</label><br>
        <input type="number" id="mgrssn" name="mgrssn" required><br>
        <input type="submit" value="Submit">
    </form>

</body>

</html>