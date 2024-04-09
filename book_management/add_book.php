<!DOCTYPE html>

<?php
    include '../imports/database.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $isbn = $_POST['isbn'];
        $title = $_POST['title'];

        $author = $_POST['author'];
        $genres = $_POST['genres'];
        $available = $_POST['available'];

        if ($available == "yes") {
            $available = 1;
        } else {
            $available = 0;
        }

        // Convert genres array to string
        $genres_str = implode(",", $genres);

        $dataArr = [$title, $isbn, $genres_str, $available, $author];

        addToTable($conn, "book", $dataArr, "sisis");
    }


    $genreQuery = "SHOW COLUMNS FROM book LIKE 'genre'";
    $result = mysqli_query($conn, $genreQuery);

    $row = mysqli_fetch_array($result);

    $type = $row['Type'];

    preg_match("/^(enum|set)\(\'(.*)\'\)$/", $type, $matches);

    if(isset($matches[2])){
        $enum = explode("','", $matches[2]);
    }


?>



<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Add a New Book</title>
</head>
<body>

    <?php include '../imports/dropdown.php'; ?>

    <h1>Add a New Book</h1>
    <form action="add_book.php" method="post">
        <label for="isbn">ISBN:</label><br>
        <input type="number" id="isbn" name="isbn" min="0" max="9999999999999" required><br>
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br>
        <label for="author">Author:</label><br>
        <input type="text" id="author" name="author" required><br>
        <label for="genres">Genres:</label><br>
        <?php foreach($enum as $genre): ?>
            <label><input type="checkbox" name="genres[]" value="<?php echo $genre; ?>"><?php echo $genre; ?></label><br>
        <?php endforeach; ?>
        <label for="available">Available:</label><br>
        <select id="available" name="available" required>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select><br>
        <input type="submit" value="Submit">
    </form>


</body>
</html>


<?php

    // Query to select all books
    $bookQuery = "SELECT * FROM book";

    $result = mysqli_query($conn, $bookQuery);


    // Fetch and print each book
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ISBN: " . $row['ISBN'] . "<br>";
        echo "Title: " . $row['Title'] . "<br>";
        echo "Author: " . $row['Author'] . "<br>";
        echo "Genre: " . $row['Genre'] . "<br>";
        
        if ($row['Available'] == 1) {
            echo "Available: Yes<br><br>";
        } else {
            echo "Available: No<br><br>";
        }

    }

    // Free the result set
    mysqli_free_result($result);

    // Close the connection
    mysqli_close($conn);
?>