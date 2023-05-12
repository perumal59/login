<?php
// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['name']) || isset($_POST['email']) || isset($_POST['password']) || isset($_POST['image'])) {
  // Get form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $image = $_FILES['image'];

//   email 

  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $sql = "SELECT * FROM `user` WHERE email='$email'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    $message = "Email address already exists!";
    echo "<script>alert('$message');</script>";
    echo "<script>location.href='http://localhost/login/home.html';</script>";
    }


//  store data
  else {
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


    $sql = "INSERT INTO `user`(`name`,`email`,`password`,`image`) VALUES ('$name', '$email','$password','$upload_image')";
    if ($conn->query($sql) === TRUE) {
        $loginpage = "Registered : Go to the login page";
         echo "<script>alert('$loginpage');</script>";
         echo "<script>location.href='http://localhost/login/login.html';</script>";
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}
$conn->close();

?>

