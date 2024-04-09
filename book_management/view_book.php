
<?php
    include "../imports/database.php";

    $query = "SELECT * FROM book";
    $result = mysqli_query($conn, $query);
    $bookArr = array();
    while($row = mysqli_fetch_assoc($result)){
        array_push($bookArr, $row);
    }

?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>View Books</title>
    </head>

    <body>
        <?php include '../imports/dropdown.php'; ?>
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
        } 
        ?> 
    </body>

</html>