<!DOCTYPE hmtl>

<?php
include "../imports/database.php";

$query = "SELECT * FROM librarian";
$result = mysqli_query($conn, $query);
$staffArr = array();
while($row = mysqli_fetch_assoc($result)){
    array_push($staffArr, $row);
}


?>


<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <?php include '../imports/dropdown.php'; ?>

        <title>Modify Staff</title>
        
    </head>

    <body>
        <h1>Modify Staff</h1>
        <?php
        foreach($staffArr as $row ){

            echo "<br><br>";
            
            $ssn = $row["SSN"];
            $Fname = $row["Fname"];
            $Lname = $row["Lname"];
            $EmpID = $row['EmployeeID'];
            $SupervisorID = $row["SupervisorID"];
            
            echo "<div class='ssn'>SSN: $ssn</div>";
            echo "<div class='name'> $Lname, $Fname</div>";
            echo "<div class='etc'>Employee ID: $EmpID</div>";
            echo "<div class='etc'>Supervisor ID: $SupervisorID</div>";
            echo "<button type='button' class='button' onclick='location.href=\"modify_staff_form.php?ssn=$ssn\";'> Modify This Staff Member </button>";
        } 
        ?> 
    </body>

</html>
