<?php

    include '../imports/database.php';


    $query = "SELECT * FROM book";
    $result = mysqli_query($conn, $query);
    $bookArr = array();
    while($row = mysqli_fetch_assoc($result)){
        array_push($bookArr, $row);
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
        foreach($bookArr as $row ){

            echo "<br><br>";
            
            $title = $row["Title"];
            $isbn = $row["ISBN"];
            $author = $row["Author"];

            echo "<div class='title'>$title</div>";
            echo "<div class='author'>by $author</div>";
            echo "<div class='isbn'>ISBN: $isbn</div>";
            if($row["Available"] == '1'){
                echo "<div class='isbn'>Available</div>";
            }
            else{
                echo "<div class='isbn'>Not Available</div>";
            }
            echo "<button type='button' class='button' onclick='location.href=\"modify_book_form.php?isbn=$isbn\";'> Modify This Book </button>";
        } 
        ?> 
    </body>

</html>

