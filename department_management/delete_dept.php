<?php
    include '../imports/database.php';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $isPost = true;
        if(count($_POST) > 0){
            deleteFromTable($conn, 'department', 'Dnumber', $_POST['dnum']);
        }else{
            clearTable($conn, 'department');
        }

    }else{
        $isPost = false;
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
    <title>Delete Department</title>
</head>

<body>
    <?php if($isPost And count($_POST) == 0): ?>
        <h1>All Departments deleted</h1>
    <?php else: ?>    
        <h1>Delete all Departments?</h1>
        <form action="delete_dept.php" method="post">
            <input type="submit" value="Delete all departments" onclick="return confirmForm(this);">
        </form>
    <?php endif; ?>

    <script type="text/javascript">
        function confirmForm(form){
            return confirm("Are you sure? \nThis action cannot be undone!");
        }
    </script>

<?php
foreach($deptArr as $row ){

    echo "<br><br>";
            
    $dName = $row["Dname"];
    $dNum = $row["Dnumber"];
    $mgrSSN = $row["Mgr_ssn"];
    echo "<form action='delete_dept.php' method='post'>";
    echo "<div class='dname'>Dept. Name: $dName</div>";
    echo "<div class='dnum'>Dept. No.: $dNum</div>";
    echo "<div class='etc'>Manager SSN: $mgrSSN</div>";
    echo "<input type='hidden' value='$dNum' name='dnum'/>";
    echo "<button type='submit' class='deleteButton' onclick='return confirmForm(this);' > Delete This Department? </button>";
    echo "</form>";
} 
?> 
</body>
</html>