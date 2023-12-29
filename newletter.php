<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name']) && isset($_POST['email'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];

        // Check if the email already exists in the database
        $checkSql = "SELECT * FROM newsletter_subscribers WHERE email = '$email'";
        $result = mysqli_query($conn, $checkSql);

        if (mysqli_num_rows($result) > 0) {
            // User is already subscribed
            echo "<script>
                    alert('You are already subscribed to the newsletter. Thank you!');
                    window.location.href = 'NewsLetter.html';
                  </script>";
        } else {
            // User is not subscribed, proceed with the subscription
            $insertSql = "INSERT INTO newsletter_subscribers (namee, email) VALUES ('$name', '$email')";
            if (mysqli_query($conn, $insertSql)) {
                echo "<script>
                        alert('Subscription successful!');
                        window.location.href = 'NewsLetter.html';
                      </script>";
            } else {
                echo "Error: " . $insertSql . "<br>" . mysqli_error($conn);
            }
        }
    }
}
?>
