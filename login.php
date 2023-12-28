<!DOCTYPE html>
<html>

<body>
<?php
session_start();

require('db_connect.php');

if (isset($_POST['email']) && isset($_POST['password'])) {
    $username = $_POST['email'];
    $password = $_POST['password'];
    
    $username = $conn->real_escape_string($username);
    

    $query = "SELECT * FROM EnrolledStudent WHERE Email='$username'";
    $result = $conn->query($query);
    

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];
        

        if (password_verify($password, $hashedPassword)) {
            
            $_SESSION['user'] = $username;
            $current_user = $_SESSION['user'];
            echo "<div id='email' style='display:none;'>$username</div>";
            header("Location: home.html"); 
        } else {
            echo "<div class='alert alert-danger'>Invalid password credentials</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Invalid user credentials</div>";
    }
    
}



 
?>