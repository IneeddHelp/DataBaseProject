<?php
    include '../imports/database.php';
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
    <title>View Department</title>
    <link rel="stylesheet" href="style.css">
    <?php include '../imports/dropdown.php'; ?>
</head>
<body>
<?php
        foreach($deptArr as $row ){

            echo "<br><br>";
            
            $dName = $row["Dname"];
            $dNum = $row["Dnumber"];
            $mgrSSN = $row["Mgr_ssn"];

            echo "<div class='dname'>Dept. Name: <u>$dName</u></div>";
            echo "<div class='dnum'>Dept. No.: $dNum</div>";
            echo "<div class='etc'>Manager SSN: $mgrSSN</div>";
        } 
        ?> 
</body>
</html>