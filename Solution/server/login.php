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

if (isset($_POST['login'])) {
    $password =  $_POST['password'] ;
    $email =  $_POST['email'] ; 

    $sql = "SELECT * FROM user WHERE password = '$password' AND email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        session_start();
        $_SESSION['user'] = $user['first_name'] . " " . $user['last_name'];
        echo $user['first_name'] . " " . $user['last_name'];
        header("Location: ../about.php");
    } else {
        $_SESSION['errors'] = "Username and password do not match.";
    }


}