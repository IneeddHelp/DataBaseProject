<!DOCTYPE html>

<?php
    include "../imports/database.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $isPost = true;
        if(count($_POST) > 0){
            deleteFromTable($conn, 'librarian', 'ssn', $_POST['ssn']);
        }else{
            clearTable($conn, 'librarian');
        }
    }
    else{
        $isPost = false;
    }

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
    <title>Staff Deletion</title>
</head>

<body>

    <?php include '../imports/dropdown.php'; ?>
    <?php if($isPost And count($_POST) == 0): ?>
        <h1>All Staff deleted</h1>
    <?php else: ?>    
        <h1>Delete all Staff?</h1>
        <form action="delete_staff.php" method="post">
            <input type="submit" value="Delete all staff" onclick="return confirmForm(this);">
        </form>
    <?php endif; ?>
</body>


<script type="text/javascript">
    function confirmForm(form){
        return confirm("Are you sure? \nThis action cannot be undone!");
    }
</script>


<?php
foreach($staffArr as $row ){

    echo "<br><br>";
            
    $ssn = $row["SSN"];
    $Fname = $row["Fname"];
    $Lname = $row["Lname"];
    $EmpID = $row['EmployeeID'];
    $SupervisorID = $row["SupervisorID"];

    echo "<form action='delete_staff.php' method='post'>";
    echo "<div class='ssn'>SSN: $ssn</div>";
    echo "<div class='name'>Name: $Lname, $Fname</div>";
    echo "<div class='etc'>ID: $EmpID</div>";
    echo "<input type='hidden' value='$ssn' name='ssn'/>";
    echo "<button type='submit' class='deleteButton' onclick='return confirmForm(this);' > Delete This Staff Member? </button>";
    echo "</form>";
} 
?> 
