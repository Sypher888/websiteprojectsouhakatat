<?php

include('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $name = $_POST['namee'];
    $phoneNumber = $_POST['number'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Check if the email already exists in the database
    $checkSql = "SELECT * FROM contactdetails WHERE email = '$email'";
    $result = $conn->query($checkSql);

    if ($result->num_rows > 0) {
        // User already exists
        echo "<script>
                alert('You have already submitted a contact request. Thank you!');
                window.location.href = 'contact.html';
              </script>";
    } else {
        // User does not exist, proceed with the contact request
        $sql = "INSERT INTO contactdetails (namee, phonenumber, email, message) VALUES ('$name', '$phoneNumber', '$email', '$message')";

        if ($conn->query($sql) === TRUE) {
            // Contact request successful
            echo "<script>
                    alert('Contact request submitted successfully!');
                    window.location.href = 'contact.html';
                  </script>";
        } else {
            // Error in inserting the record
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>
