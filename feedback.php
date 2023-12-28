<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Page</title>
</head>
<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 20px;
        background: linear-gradient(90deg, #3498db 0%, #fff 100%);
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
    min-height: 150px;
    transition: transform 0.2s;
}

.feedback:hover {
    transform: scale(1.02); 
    height: auto;
}

    .feedback h3 {
        color: #3498db;
        margin-bottom: 10px;
    }

    .feedback p {
        color: #333;
        margin: 10px 0;
    }

    .feedback strong {
        color: #3498db;
    }

    .feedback a {
        display: block;
        text-align: center;
        background-color: #3498db;
        color: #fff;
        text-decoration: none;
        padding: 8px 0;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .feedback a:hover {
        background-color: #217dbb;
    }


    .feedback button {
    background-color: #3498db; 
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    width: 100px;
    margin-top: 10px;
}

.feedback button:hover {
    background-color: #217dbb;
}

    .notification {
        background-color: #f5f5f5;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .back-btn {
        position: fixed;
        top: 10px;
        left: 14px;
        background-color: #1e90ff;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .back-btn:hover {
        background-color: #217dbb;
    }
</style>
<body>

  
    <button class="back-btn" onclick="goBack()">Back</button>

    <?php
       
        include('db_connect.php');

     
        $sql = "SELECT feedback_id, user_name, feedback_text FROM feedbacks";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<div class='feedback-container'>";
            while ($row = $result->fetch_assoc()) {
                echo "<div class='feedback'>";
                echo "<h3>" . $row['user_name'] . "'s Feedback</h3>";
              
                echo "<p><strong>Feedback:</strong> " . $row['feedback_text'] . "</p>";
                
                
                echo "<p><a href='feedback_details.php?feedback_id=" . $row['feedback_id'] . "'>View Details</a></p>";
                
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "<p>No feedback available.</p>";
        }

        $conn->close();
    ?>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
