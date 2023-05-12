<?php

 if(isset($_GET['id'])){
 $id=$_GET['id'];
 
 $conn = new mysqli('localhost', 'root','', 'login');
 $sql="delete from `user` where id=$id";

if(mysqli_query($conn,$sql)){
    echo "<script>location.href='http://localhost/login/profile.php';</script>";
}
else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 }
 ?>