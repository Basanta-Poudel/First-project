<?php

        require('connection.php');

        if(isset($_GET['sem_id'])){
        $sem_id = $_GET['sem_id'];

        $select = "SELECT id,course from courses where sem_id = $sem_id";
        $result = mysqli_query($con,$select);
        $arr = [];
        while($data = mysqli_fetch_assoc($result)){
        $arr[] = $data;
        }
        if(empty($arr)){
        $response = [
        "data" => [],
        "status" => false,
        ];
        echo json_encode($response);
        }else{
        $response = [
        "data" => $arr,
        "status" => true,
        ];
        echo json_encode($response);
        }
        }else{
        $response = [
        "data" => [],
        "status" => false,
        ];
        echo json_encode($response);
}