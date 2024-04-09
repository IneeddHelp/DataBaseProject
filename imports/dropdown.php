<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/DataBaseProject/imports/dropdown.css">
</head>

<body>
    <ul>
        <li><a href="/DataBaseProject/Homepage.php">Home</a></li>
        <li class = "dropdown">
            <a href="#books" class="dropbtn">Books</a>
            <div class="dropdown-content">
                <a href="/DataBaseProject/book_management/view_book.php">View Books</a>
                <a href="/DataBaseProject/book_management/rent_return.php">Rent/Return Book</a>
                <a href="/DataBaseProject/book_management/add_book.php">Add Book</a>
                <a href="/DataBaseProject/book_management/delete_book.php">Delete Book</a>
            </div>
        </li>
        
        <li class="dropdown">
          <a href="#staff" class="dropbtn">Library Staff</a>
          <div class="dropdown-content">
            <a href="/DataBaseProject/staff_management/view_staff.php">View Staff</a>
            <a href="/DataBaseProject/staff_management/add_staff.php">Add Staff</a>
            <a href="/DataBaseProject/staff_management/delete_staff.php">Delete Staff</a>
            <a href="/DataBaseProject/staff_management/modify_staff.php">Manage Staff</a>
          </div>
        </li>

        <li class="login"><a href="/DataBaseProject/auth/login.php">Login</a></li>

    </ul>
</body>
</html>