<?php

require_once('connection.php');


//    $con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_POST['upload'])) {
    $filename = $_FILES['noteFile']['name'];
    $fileTmpPath = $_FILES['noteFile']['tmp_name'];

    // Read the file content
    $fileData = file_get_contents($fileTmpPath);

    // Prepare the SQL statement
    $stmt = $con->prepare("INSERT INTO pdf_files (filename, file_data) VALUES (?, ?)");
    $stmt->bind_param("sb", $filename, $null);

    // Bind the file data
    $stmt->send_long_data(1, $fileData);

    // Execute the statement
    if ($stmt->execute()) {
        echo "File uploaded successfully.";
    } else {
        echo "File upload failed: ";
    }

    $stmt->close();
}


$con->close();
?>

?>