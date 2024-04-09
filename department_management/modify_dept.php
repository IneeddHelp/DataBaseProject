<?php

    include '../imports/database.php';


    $query = "SELECT * FROM department";
    $result = mysqli_query($conn, $query);
    $deptArr = array();
    while($row = mysqli_fetch_assoc($result)){
        array_push($deptArr, $row);
    }


?>


<!DOCTYPE hmtl>

<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <?php include '../imports/dropdown.php'; ?>

        <title>Modify Departments</title>
        
    </head>

    <body>
        <h1>Modify Departments</h1>
        <?php
        foreach($deptArr as $row ){

            echo "<br><br>";
            
            $dName = $row["Dname"];
            $dNum = $row["Dnumber"];
            $mgrSSN = $row["Mgr_ssn"];
            
            echo "<div class='dname'>Dept. Name: $dName</div>";
            echo "<div class='dnum'> Dept. No.: $dNum</div>";
            echo "<div class='etc'>Manager SSN: $mgrSSN</div>";
            echo "<button type='button' class='button' onclick='location.href=\"modify_dept_form.php?dnum=$dNum\";'> Modify This Staff Member </button>";
        } 
        ?> 
    </body>

</html>

