<?php
require_once('connection.php');

if (isset($_POST['login'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        echo "Please fill in both fields.";
    } else {
        $inputUsername = $_POST['username'];
        $inputPassword = $_POST['password'];

        // Fetch data from the database
        $query = $con->prepare("SELECT username, password FROM admin WHERE username = ?");
        $query->bind_param("s", $inputUsername);
        $query->execute();
        $result = $query->get_result();
        if ($result->num_rows > 0) {
            // Fetch associative array
            $row = $result->fetch_assoc();

            // Compare the fetched data with the input data
            if ($row['username'] === $inputUsername && $row['password'] === $inputPassword) {
                header("location:admin.html");
            } else {
                echo "Invalid username or password.";
            }
        } else {
            echo "No such user found.";
        }

        // Close the prepared statement
        $query->close();
    }
} else {
    // header("Location: user.html");
    echo "failed";
    exit();
}

$conn->close();
