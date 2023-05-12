<?php
    $conn = new mysqli('localhost', 'root','', 'login');
    $id= $_GET['id'];

    $sql = "select * from `user` where id=$id";

   $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $name=$row['name'];
    $email=$row['email'];
    $password=$row['password'];
    $image=$row['image'];
    
if (isset($_POST['name']) || isset($_POST['email']) || isset($_POST['password']) || isset($_POST['image']))  {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $image = $_FILES['image'];

    $imagefilename=$image['name'];
    $imagefileerror=$image['error'];
    $imagefiletemp=$image['tmp_name']; 
  
    $filename_separate=explode('.',$imagefilename);
    $file_extension=strtolower($filename_separate[1]);
  
    $extension=array('jpeg','jpg','png');
    if(in_array( $file_extension, $extension)){
      $upload_image='upload/'.$imagefilename;
      move_uploaded_file($imagefiletemp,$upload_image);
    }


    $sql = "update `user` set id=$id,name='$name',email='$email',password='$password',image='$upload_image' where id=$id" ;
    
if (mysqli_query($conn,$sql)) {
    echo "<script>location.href='http://localhost/login/profile.php';</script>";
} else
{
   echo "Error: " . $sql . "<br>" . $conn->error;
}
  } 

$conn->close();

     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="update.css">
</head>
<body>
<div class="info">
        <form  method="post" class=" container col-6 "  enctype="multipart/form-data">
            <label>Name</label>
            <input type="text" name="name" id="id" required  value=<?php echo $name;?>>
            <label>Email</label>
            <input type="email" name="email" id="email" required  value=<?php echo $email; ?>>
            <label>Password</label>
            <input type="text" name="password" id="password" required  value=<?php echo $password; ?>>
            <label>Select your profile image</label>
            <input type="file" name="image" id="image" required value=<?php echo $image; ?>>
            <button type="submit">Save</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</body>
</html>
