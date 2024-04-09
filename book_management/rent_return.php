<!DOCTYPE html>

<?php

include "../imports/database.php";



if($_SERVER["REQUEST_METHOD"] == "POST"){
    $isNowRented = $_POST['rented'] == "1" ? "1" : "0";
    updateTable($conn, 'book', 'isbn', $_POST['isbn'], 'available', $isNowRented);

}

$rented = selectFromTable($conn, 'book', ['available'], [0]);

$notRented = selectFromTable($conn, 'book', ['available'], [1]);

function printBooks($bookArr, $rented){
    foreach($bookArr as $book){
        $title = $book[0];
        $isbn = $book[1];
        $genres = $book[2];
        $author = $book[4];

        echo "<form method='post'>";
        echo "<h4 class='h4'>$title</h4>";
        echo "<h5 class='h5'>ISBN: $isbn</h5>";
        echo "Genres: $genres<br>";
        echo "Written By $author";
        echo "<br><br>";
        echo "<input type='hidden' value='$isbn' name='isbn'/>";
        echo "<input type='hidden' value='$rented' name='rented'/>";
        if($rented){
            echo "<button type='submit' class='rentButton'>Rent</button>";
        }else{
            echo "<button type='submit' class='returnButton'>Return</button>";
        }

        echo "</form>";

        
    }
}

?>


<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include '../imports/dropdown.php'; ?>
    <h1> 
        Rented Books
    </h1>
    <br>
    <?php
        printBooks($rented, true);
    ?>

    <br> <br>

    <h1>
        Available books
    </h1>
    <?php
        printBooks($notRented, false);
    ?>
</body>