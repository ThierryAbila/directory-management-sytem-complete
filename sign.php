<?php
$succes=0;
$user=0;
if($_SERVER['REQUEST_METHOD']=='POST'){
  include 'connect.php';
  $admin=  $_POST['admin'];  
  $email=$_POST['email'];
  $password=$_POST['password'];

  $sql= "select * from `signup` where admin='$admin'";
  $result= mysqli_query($con,$sql);
  if($result){
    $num=mysqli_num_rows($result);
    if($num>0){
      // echo "user already exist"; 
      $user=1;
    }else{
    $sql="insert into `signup`(admin,email,password) values('$admin','$email','$password')";
   $result=mysqli_query($con,$sql);
   if($result){
      //  echo "signup succesful"; 
      $succes=1;
     }else{
       die(mysqli_error($con));
     }
    }
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <?php
    if($user){
      echo '<div classs="alert-danger alert-dismissible fade show" role="alert"<strong>ohh no sorry</strong> user already exist.<button type="button"class="close" data-disniss="alert"aria-label="close"> <span aria-hidden="true">&times;</span></buttton></div>';
    }
    ?>
     <?php
    if($succes){
      echo '<div classs="alert-success alert-dismissible fade show" role="alert"<strong>success</strong>you have successfully signup .<button type="button"class="close" data-disniss="alert"aria-label="close"> <span aria-hidden="true">&times;</span></buttton></div>';
    }
    ?>
    <div class="container my-5">
    <h1 class="text-center">signup page</h1>
      <form action="sign.php" method="POST">
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" class="form-control" placeholder="enter your name" name="admin">
        </div>
        <div class="mb-3">
        <label class="form-label">Email</label>
          <input type="email" class="form-control"  placeholder="enter your email" name="email">
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" placeholder="enter your password" name="password">
        </div>
        <button type="submit" class="btn btn-primary w-100">Signup</button>
    </form>
    <div class="small1">
      <p>already have and account:<a href="login.php">login</a></p>
    </div>
    </div>

  </body>
</html>