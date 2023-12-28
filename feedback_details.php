<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Feedback Details</title>
</head>
<style>
     body {
    font-family: 'Arial', sans-serif;
    margin: 20px;
    background: linear-gradient(90deg, #6a0572 0%, #f5f5f5 100%);
}

.feedback-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center; 
    align-items: center;
}

.feedback {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin: 20px;
    width: 300px;
    transition: transform 0.2s;
}

.feedback:hover {
    transform: scale(1.02);
}

.feedback h3 {
    color: #6a0572;
    margin-bottom: 10px;
}

.feedback p {
    color: #333;
    margin: 10px 0;
}

.feedback strong {
    color: #6a0572; 
}

.feedback a {
    display: block;
    text-align: center;
    background-color: #6a0572;
    color: #fff;
    text-decoration: none;
    padding: 8px 0;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.feedback a:hover {
    background-color: #4b034b;
}


.feedback button {
    background-color: #6a0572; 
    color: #fff; 
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.feedback button:hover {
    background-color: #4b034b; 
}

.notification {
    background-color: #f5f5f5;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 10px;
}
</style>
<body>

<?php
include("db_connect.php");

  


  
    $feedback_id = isset($_GET['feedback_id']) ? $_GET['feedback_id'] : null;

    if ($feedback_id) {
      
        $sql = "SELECT user_name, rating, feedback_text FROM feedbacks WHERE feedback_id = $feedback_id";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<div class='feedback-container'>";
            echo "<div class='feedback'>";
            echo "<h3>" . $row['user_name'] . "'s Feedback</h3>";
            echo "<p><strong>Rating:</strong> " . $row['rating'] . "</p>";
            echo "<p><strong>Feedback:</strong> " . $row['feedback_text'] . "</p>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "<p>No details available for the specified feedback.</p>";
        }
    } else {
        echo "<p>No feedback ID specified in the URL.</p>";
    }

    $conn->close();
?>

</body>
</html>
