<?php
    include '../imports/database.php';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
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

        updateTableArr($conn, "book", "ISBN", $_POST["oldnum"], ["Title", "ISBN", "Genre", "Available", "Author"], $dataArr);
        header("Location: modify_book.php");
        die;
    }else{
        $isbn = $_GET["isbn"];
        $row = selectFromTable($conn, "book", ["ISBN"], [$isbn])[0];
        $genreQuery = "SHOW COLUMNS FROM book LIKE 'genre'";
        $result = mysqli_query($conn, $genreQuery);

        $genreRow = mysqli_fetch_array($result);

        $type = $genreRow['Type'];

        preg_match("/^(enum|set)\(\'(.*)\'\)$/", $type, $matches);

        if(isset($matches[2])){
            $enum = explode("','", $matches[2]);
        }

        
    }
    
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Modify Department</title>
    <?php include '../imports/dropdown.php'; ?>

    <script>
    function validateForm(){
        let form = document.forms["form"]
        let isValid = form["isbn"].value.length == 9;

        if(!isValid){
            alert("ISBN must be 9 digits");
        }

        return isValid;

    }
        </script>

</head>
<body>
<form action="modify_book_form.php" method="post" name="form" onsubmit="return validateForm()">
        <label for="isbn">ISBN:</label><br>
        <input type="number" id="isbn" name="isbn" min="0" max="9999999999999" required value="<?= $row[1] ?>"><br>
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required value="<?= $row[0] ?>"><br>
        <label for="author">Author:</label><br>
        <input type="text" id="author" name="author" required value="<?= $row[4] ?>"><br>
        <label for="genres">Genres:</label><br>
        <?php foreach($enum as $genre): ?>
            <label><input type="checkbox" name="genres[]" value="<?php echo $genre; ?>"><?php echo $genre; ?></label><br>
        <?php endforeach; ?>
        <label for="available">Available:</label><br>
        <select id="available" name="available" required>
            <option value="yes" <?php if($row[3] == "1"){echo "selected";} ?> >Yes</option>
            <option value="no" <?php if($row[3] == "0"){echo "selected";} ?>>No</option>
        </select><br>
        <input type="hidden" name="oldnum" value="<?= $isbn ?>">
        <input type="submit" value="Submit">
    </form>

</body>
</html>