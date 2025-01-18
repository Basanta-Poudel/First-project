<?php
require_once('connection.php');

if (isset($_GET['semester'])) {
    // $semester_id = $_POST['semester'];
    
    $query = "SELECT subject FROM first_semester ";
    $result=mysqli-query($con, $query);
    
    $subjects = [];
    while ($row = $result->mysqli_fetch_assoc()) {
        $subjects[] = $row;
    }
    echo"$subjects";
    echo json_encode($subjects, JSON_PRETTY_PRINT);
}
?>
