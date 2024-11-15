<?php

$db_host = "localhost"; 
$db_username = "root"; 
$db_password = ""; 
$db_name = "studentrecord"; 


$conn = new mysqli($db_host, $db_username, $db_password, $db_name);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    $name = $_POST['name'];
    $username = $_POST['username'];
    $new_password = $_POST['new_password'];
     
   

    $sql = "UPDATE users set password ='$new_password' where username='$username' and name='$name'";

    if ($conn->query($sql) === TRUE) {
        echo "Password changed successfully";
        header("Location: login.html");
      
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }



$conn->close();


?>



