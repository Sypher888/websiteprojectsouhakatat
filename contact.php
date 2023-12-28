<?php

include('db_connect.php');






if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $name = $_POST['namee'];
    $phoneNumber = $_POST['number'];
    $email = $_POST['email'];
    $message = $_POST['message'];


    $sql = "INSERT INTO contactdetails (namee, phonenumber, email, message) VALUES ('$name', '$phoneNumber', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
