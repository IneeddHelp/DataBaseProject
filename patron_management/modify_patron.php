<?php
    include '../imports/database.php';
    $query = "SELECT * FROM patron";
    $result = mysqli_query($conn, $query);
    $patArr = array();
    while($row = mysqli_fetch_assoc($result)){
        array_push($patArr, $row);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Patrons</title>
    <link rel="stylesheet" href="style.css">
    <?php include '../imports/dropdown.php'; ?>
</head>
<body>
<?php
        foreach($patArr as $row ){

            echo "<br><br>";
            
            $ssn = $row["SSN"];
            $Fname = $row["Fname"];
            $Lname = $row["Lname"];
            $libID = $row['LibraryID'];
            $addr = $row['Address'];
            $user = $row['Username'];
            $pass = $row['Password'];
            
            echo "<div class='ssn'>SSN: $ssn</div>";
            echo "<div class='name'> $Lname, $Fname</div>";
            echo "<div class='etc'>Library ID: $libID</div>";
            echo "<div class='etc'>Address: $addr</div>";
            echo "<div class='etc'>Username: $user</div>";
            echo "<div class='etc'>Password: $pass</div>";
            echo "<button type='button' class='button' onclick='location.href=\"modify_patron_form.php?ssn=$ssn\";'> Modify This Patron </button>";


        } 
        ?> 
</body>
</html>