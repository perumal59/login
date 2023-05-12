<?php


$conn = new mysqli('localhost', 'root', '', 'login');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['email']) || isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "<script>location.href='http://localhost/login/profile.php';</script>";
} else {
    $message = "User not Found! please register";
    echo "<script>alert('$message');</script>";
    echo "<script>location.href='http://localhost/login/home.html';</script>";
}
}
$conn->close();
?>
