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
                <a href="/DataBaseProject/book_management/modify_book.php">Manage Books</a>
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

        <li class="dropdown">
            <a href="#department" class="dropbtn">Departments</a>
            <div class="dropdown-content">
                <a href="/DataBaseProject/department_management/view_dept.php">View Department</a>
                <a href="/DataBaseProject/department_management/add_dept.php">Add Department</a>
                <a href="/DataBaseProject/department_management/delete_dept.php">Delete Department</a>
                <a href="/DataBaseProject/department_management/modify_dept.php">Manage Department</a>
            </div>
        </li>

        <li class="dropdown">
            <a href="#patrons" class="dropbtn">Patrons</a>
            <div class="dropdown-content">
                <a href="/DataBaseProject/patron_management/view_patron.php">View Patron</a>
                <a href="/DataBaseProject/patron_management/add_patron.php">Add Patron</a>
                <a href="/DataBaseProject/patron_management/delete_patron.php">Delete Patron</a>
                <a href="/DataBaseProject/patron_management/modify_patron.php">Manage Patron</a>
            </div>
        </li>

        <!-- <li class="login"><a href="/DataBaseProject/auth/login.php">Login</a></li> -->

    </ul>
</body>
</html>