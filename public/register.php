<?php
require_once('connection.php');

if (isset($_POST['register'])) {
    if (empty($_POST['name']) || empty($_POST['username']) || empty($_POST['password'])) {
        echo "Please fill up the form.";
    } else {
        // If id is auto-increment, you don't need to include it in the insert query
        $name = $_POST['name'];
        $userName = $_POST['username'];
        $password = $_POST['password'];

        // Use prepared statements to prevent SQL injection
        $query = $con->prepare("INSERT INTO admin (name, username, password) VALUES (?, ?, ?)");
        $query->bind_param("sss", $name, $userName, $password);

        if ($query->execute()) {
            // echo "Registered Successfully.";
            header("location:user.html");
        } else {
            echo "Error: " . $query->error;
        }

        // Close the prepared statement
        $query->close();
    }
} else {
    header("Location: user.html");
    exit();
}

$con->close();
?>
