<?php 
   require_once('connection.php');

   $query="select * from admin";
   $result=mysqli_query($con, $query);

   $row=mysqli_fetch_assoc($result)
   


?>




<!-- admin -->
<?php
    require_once('connection.php');

    if(isset($_GET['username'])){
        $username=$_GET['usernmae'];
    }
    else{
        header("location:user.php");
    }

?>