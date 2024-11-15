<?php

$db_host = "localhost"; 
$db_username = "root"; 
$db_password = ""; 
$db_name = "studentrecord"; 


$conn = new mysqli($db_host, $db_username, $db_password, $db_name);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
     
    // check if user alredy exist
    $check_query = "SELECT * FROM users WHERE username = '$username'";
    $check_result = $conn->query($check_query);


    if ($check_result->num_rows > 0){
        echo "Username already registered";
    }
    else{
    $sql = "INSERT INTO users (name, username, password) VALUES ('$name', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}


$conn->close();


?>


