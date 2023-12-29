<?php
// Check if files were uploaded
if ($_FILES && isset($_FILES['files'])) {
    $uploadDir = 'uploads/'; // Change this to your desired upload directory

    // Create the upload directory if it doesn't exist
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $uploadedFiles = [];

    // Loop through each uploaded file
    foreach ($_FILES['files']['tmp_name'] as $key => $tmpName) {
        $fileName = $_FILES['files']['name'][$key];
        $filePath = $uploadDir . $fileName;

        // Move the file to the upload directory
        if (move_uploaded_file($tmpName, $filePath)) {
            $uploadedFiles[] = $fileName;
        }
    }

    if (empty($uploadedFiles)) {
        // No files were uploaded
        echo "No files uploaded.";
    } else {
        // Files uploaded successfully
        echo "Files uploaded successfully: " . implode(', ', $uploadedFiles);
        sleep(2);
        // Redirect back to the main page
        header("Location: home.html");
        exit();
    }
} else {
    // No files were uploaded
    echo "No files uploaded.";
}
?>
