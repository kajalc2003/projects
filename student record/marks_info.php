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
   
    $physics = $_POST["physics"];
    $chemistry = $_POST["chemistry"];
    $math = $_POST["math"];
    $geography = $_POST["geography"];
    $marathi = $_POST["marathi"];
    $english = $_POST["english"];
    $hindi = $_POST["hindi"];
    $s_roll_no = $_POST['s_roll_no'];

    
    $total_marks = $physics + $chemistry + $math + $geography + $marathi + $english + $hindi;
    $percentage = ($total_marks / 700) * 100;
    

    $check_query = "SELECT * FROM marks WHERE s_roll_no = '$s_roll_no'";
    $check_result = $conn->query($check_query);
   
    if (isset($_POST["save"])) {

        if ($check_result->num_rows > 0){
            echo "this student marks alredy filled";
        }
        else{

        $sql = "INSERT INTO marks (s_roll_no, physics, chemistry, math, geography, marathi, english, hindi, total_marks, percentage ) VALUES ('$s_roll_no', '$physics', '$chemistry', '$math', '$geography', '$marathi', '$english', '$hindi', '$total_marks', '$percentage')";

        if ($conn->query($sql) === TRUE) {
            echo "data inserted ";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        exit;
    }
    }


   
    if (isset($_POST["calculate"])) {
        $result = "Total Marks: $total_marks | Percentage: $percentage%";
        echo " $result";
    }
}
$conn->close();
?>


