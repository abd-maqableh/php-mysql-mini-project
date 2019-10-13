<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "DB is Connected!";
};

if (isset($_POST['signup'])) {
     $password = $_POST['password'] ;
     $email = $_POST['email'] ; 
     $username = $_POST['username'] ; 
     $last_name = $_POST['last_name'];  
     $first_name = $_POST['first_name']; 

    $sql = "INSERT INTO user (first_name, last_name, username,password,email)
            VALUES ('$first_name', '$last_name', '$username','$password' , '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        session_start();
        $_SESSION['user'] = $first_name . " " . $last_name;
        header("Location: ../about.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();