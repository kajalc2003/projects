
<?php
//  database connection
$db_host = "localhost"; 
$db_username = "root";
$db_password = ""; 
$db_name = "studentrecord"; 
// Connect database
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    echo("Connection failed: " . $conn->connect_error);
}

// Process login form 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
    
        echo "Login successful";
        
        header("Location: student_data.html");
    } else {
       
        echo "Invalid username or password....Register first.";
    }
    
}
if(isset($_POST["Register"])){

    header("Location: register.html");
}
// Close database connection
$conn->close();


?>



