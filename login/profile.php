   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
<button class="add" ><a href="home.html">Add user</a></button>
<div class="user-info">
   <div class="users-data w-100 ">
    <h2>All Users</h2>
    <div class="info">
        <table class="table w-100 text-center">
            <thead class="thead-light">
              <tr class="w-6">
                <th scope="col">ID</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">password</th>
                <th scope="col">image</th>
                <th scope="col">update</th>
                <th scope="col">delete</th>

              </tr>
            </thead>
            <?php
            
            $conn = new mysqli('localhost', 'root','', 'login');
            $sql="SELECT * FROM `user`";
            $result=mysqli_query($conn,$sql);
              while($row=mysqli_fetch_assoc($result))
              {
                $id=$row['id'];
                $name=$row['name'];
                $email=$row['email'];
                $password=$row['password'];
                $image=$row['image'];
               echo '<tr>
                  <th scope="row">'.$id.'</th>
                  <td>'. $name.'</td>
                  <td>'.$email.'</td>
                  <td>'.$password.'</td>
                  <td><img src='.$image.'  style="width:100px; height:100px; border-radius:50%; "></td>
                  <td><button class="add3"><a href="update.php?id='.$id.' ">update</a></button></td>
                  <td><button class="add2"><a href="delete.php?id='.$id.' ">delete</a></button></td>
                </tr>';
              }
            ?>
          </table>
    </div>
   </div>
</div>
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</body>
</html>