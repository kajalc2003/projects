<?php
// Database connection 
$db_host = "localhost"; 
$db_username = "root"; 
$db_password = ""; 
$db_name = "studentrecord"; 

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $roll_no = $_POST["roll_no"];
    $name = $_POST["name"];
    $mobile_no = $_POST["mobile_no"];
    $city = $_POST["city"];
    $college_name = $_POST["college_name"];
    $faculty = $_POST["faculty"];
    


    //$sql="SELECT * FROM users";
    
    //if ($result=($conn->query($sql)) === TRUE){
       // $row= $result->fetch_assoc();
        //$uid = $row = ['userid'];
        //$uname = $row = ['name'];
    //}else{
      //  echo "Error: " . $sql . "<br>" . $conn->error;
    //}
    

    if (isset($_POST["save"])) {
        
    $sql = "INSERT INTO students (roll_no, name, mobile_no, city, college_name, faculty) VALUES ('$roll_no', '$name', '$mobile_no', '$city', '$college_name', '$faculty')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
       
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
  }
   elseif (isset($_POST["update"])) {
   $sql = "UPDATE students SET name='$name', mobile_no='$mobile_no', city='$city', college_name='$college_name', faculty='$faculty' WHERE roll_no='$roll_no'";
    
   if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";

   } else {
      echo "Error updating record: " . mysqli_error($conn);
   }
} 
  elseif (isset($_POST["delete"])) {

   $rollNo = $_POST["roll_no"];
  
  $sql = "DELETE FROM students WHERE roll_no='$rollNo'";
  
  if (mysqli_query($conn, $sql)) {
      echo "Record deleted successfully";
  } else {
      echo "Error deleting record: " . mysqli_error($conn);
  }
}

}

$conn->close();
?>