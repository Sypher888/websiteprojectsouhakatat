<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name']) && isset($_POST['email'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
       

        $sql = "INSERT INTO newsletter_subscribers (Namee, Email, comments) VALUES ('$name', '$email')";

        if (mysqli_query($conn, $sql)) {
            echo "Subscription successful!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>
