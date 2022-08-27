<?php
$login=0;
$invalid=0;
if($_SERVER['REQUEST_METHOD']=='POST'){
  include 'connect.php';
  $admin=  $_POST['admin'];
  $password=$_POST['password'];

  $sql= "select * from `signup` where admin='$admin' and password='$password'";
  $result= mysqli_query($con,$sql);
  if($result){
    $num=mysqli_num_rows($result);
    if($num>0){
    //    echo "login successful"; 
    $login=1;
    session_start();
    $_SESSION['admin']=$admin;
    header('location:home.php');
    }else{
//   echo "invalid data"; 
$invalid=1;
    }
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin login.php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
  <?php
    if($login){
      echo '<div classs="alert-success alert-dismissible fade show" role="alert"<strong>successsful</strong> you have successfully login.<button type="button"class="close" data-disniss="alert"aria-label="close"> <span aria-hidden="true">&times;</span></buttton></div>';
    }
    ?>
      <?php
    if($invalid){
      echo '<div classs="alert-danger alert-dismissible fade show" role="alert"<strong>Sorry</strong> you can not login to the admin dashbard try contacting your boss.<button type="button"class="close" data-disniss="alert"aria-label="close"> <span aria-hidden="true">&times;</span></buttton></div>';
    }
    ?>
    <div class="container my-5">
    <h1 class="text-center">login page</h1>
      <form action="login.php" method="POST">
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" class="form-control" placeholder="enter your name" name="admin">
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" placeholder="enter your password" name="password">
        </div>
        <button type="submit" class="btn btn-primary w-100">login</button>
    </form>
    </div>

  </body>
</html>