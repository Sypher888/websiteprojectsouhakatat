<?php
require_once('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);


 
   
        $sql = "INSERT INTO EnrolledStudent(Email, password) VALUES ('$email', '$password')";
        if (mysqli_query($conn, $sql)) {
            header('Location: home.html');
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    
}

mysqli_close($conn);
?>