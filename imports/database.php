<?php

//NOTE LOOK AT INFORMATION_SCHEMA FUNCTIOn
$servername = "localhost";
$username = "user";
$password = "pass";
$dbname = "librarydatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function clearTable($conn, $tableName) {
  $query = "TRUNCATE TABLE " . $tableName;
  if (mysqli_query($conn, $query)) {
      echo "Table " . $tableName . " cleared successfully.";
  } else {
      echo "Error: " . mysqli_error($conn);
  }
}

//function to add data to a table
function addToTable($conn, $tableName, $dataArr, $dataTypes){
  global $dbname, $conn;
  
  //grabs columns from the table
  $query = "SELECT COLUMN_NAME 
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_SCHEMA='$dbname' 
            AND TABLE_NAME='$tableName';";

  mysqli_real_query($conn, $query);

  $result = mysqli_use_result($conn);

  //building insert query
  $query = "INSERT INTO $tableName (";
  $numOfCols = 0;

  while($colName = mysqli_fetch_row($result)){
    if(!empty($colName)){
      $colName = $colName[0];
      $query .= $colName;
      $query .= ", ";
      $numOfCols ++;
    }
    
  }
  $query = substr($query, 0, -2);
  $query .= ") VALUES (";

  while($numOfCols > 0){
    $numOfCols--;
    $query .= "?, ";
  }
  $query = substr($query, 0, -2);
  $query .= ")";

  $stmt = $conn->prepare($query);
  $stmt->bind_param($dataTypes, ...$dataArr);

  if ($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $stmt->error;
  }
  $stmt->close();
}

function deleteFromTable($conn, $tableName, $primaryKeyName, $primaryKey){
  global $dbname;
  $query = "DELETE FROM $tableName WHERE $primaryKeyName='$primaryKey'";

  if(mysqli_query($conn, $query)){
    echo "$tableName with $primaryKeyName = $primaryKey successfully deleted";
  } else{
    echo "Error: " . mysqli_error($conn);
  }
  
}

function updateTable($conn, $tableName, $keyName, $key, $valName, $val){

  $query = "UPDATE $tableName
            SET $valName = '$val'
            WHERE $keyName = '$key';";

  mysqli_real_query($conn, $query);

}

function selectFromTable($conn, $tableName, $keyNames, $keys){
  $query = "SELECT * FROM $tableName WHERE ";

  for($i = 0; $i < count($keyNames); $i++){
     
    $query .= $keyNames[$i];
     
    $query .= "=";
     
    $key = $keys[$i];
     
    $query .= "'$key'";
     
    $query .= ", ";
    
  }
  $query = substr($query, 0,-2);
  mysqli_real_query($conn, $query);
  
  //result object, going to convert into actual
  //usable rows
  $result = mysqli_store_result($conn);
  
  $rows = array();
  for($i = 0; mysqli_data_seek($result, $i); $i++){
    $row=mysqli_fetch_row($result);  
    array_push($rows, $row);
  }

  return $rows;

}

function updateTableArr($conn, $tableName, $keyName, $key, $valNames, $vals){

  $query = "UPDATE $tableName
            SET ";
  for($i = 0; $i < count($valNames); $i++){
    $query .= $valNames[$i];
    $query .= " = ";
    $query .= "'$vals[$i]'";
    $query .= ", ";
  }
  $query = substr($query, 0,-2);
  $query .= " WHERE ";
  $query .= $keyName;
  $query .= " = ";
  $query .= "'$key'";

  echo $query;
  
  mysqli_real_query($conn, $query);
}


?>