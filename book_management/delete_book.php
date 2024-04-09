
<?php
    include '../imports/database.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $isPost = true;
        if(count($_POST) > 0){
            deleteFromTable($conn, 'book', 'isbn', $_POST['isbn']);
        }
    }
    else{
        $isPost = false;
    }

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
    <title>Delete all books?</title>
</head>

<body>

    <?php include '../imports/dropdown.php'; ?>
    <?php if($isPost And count($_POST) == 0): ?>
        <h1>All books deleted</h1>
    <?php else: ?>    
        <h1>Delete all books?</h1>
        <form action="delete_book.php" method="post">
            <input type="submit" value="Delete all books">
        </form>
    <?php endif; ?>
</body>


<script type="text/javascript">
    function confirmForm(form){
        return confirm("Are you sure? \nThis action cannot be undone!");
    }
</script>


<?php
foreach($bookArr as $row ){

    echo "<br><br>";
    
    $title = $row["Title"];
    $isbn = $row["ISBN"];
    $author = $row["Author"];

    echo "<form action='delete_book.php' method='post'>";
    echo "<div class='title'>$title</div>";
    echo "<div class='author'>by $author</div>";
    echo "<div class='isbn'>ISBN: $isbn</div>";
    echo "<input type='hidden' value='$isbn' name='isbn'/>";
    echo "<button type='submit' class='deleteButton' onclick='return confirmForm(this);' > Delete This Book? </button>";
    echo "</form>";
} 
?> 

