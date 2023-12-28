<?php
session_start();

require('db_connect.php');

if (isset($_SESSION['user'])) {
    $loggedInUser = $_SESSION['user'];
    
    $sql = "DELETE FROM EnrolledStudent WHERE Email='$loggedInUser'";

   
    if (mysqli_query($conn, $sql)) {
       
        session_destroy();
        header("Location: Welcome.html");
        exit(); 
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    header("Location: Welcome.html");
    exit();
}
?>
