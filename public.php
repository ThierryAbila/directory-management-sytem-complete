<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $zip=$_POST['zip'];

    $sql="insert into `public` (name,email,mobile,address,city,zip) values('$name','$email','$mobile','$address','$city','$zip')";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "Data inserted successfully"; 
        // header('location:display.php'); 

    }else{
        die(mysqli_error($con));
    }

}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Users</title>
         <!-- bootstrap styleling  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="home.css">
  </head>
  <body>
    <!-- sidebar -->
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <ul>
            <h1> Admin</h1>
            <a href="home.php">
                <li> Dashboard</li>
            </a>
            <a href="#">
                <div id="btn"> Add directory  >
                    <i class="bx bx-chevron-right"></i>
                </div>
                <ul id="list">
                   <a href="public.php"><li>
                   Make public
                    </li></a>
                    <a href="private.php">
                        <li>Make private</li>
                    </a>
                </ul>
            </a>
            <a href="#">
                <li>modify directory</li>
            </a>
            <a href="private_search.php">
                <li>Search Directory</li>
            </a>
            <a href="#">
                <li>Direct by Status</li>
            </a>
            <a href="logout.php">
                <li class="red">logout</li>
            </a>
        </ul>
</div>
<div class="navbar">
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
</div>
<!-- sidebar -->
    <div class="container my-5">
        <form class="row g-3" method="post">
            <div class="col-md-6">
                <label  class="form-label">User Name</label>
                <input type="text" class="form-control" placeholder="enter Usser's name" name="name" autocomplete="off">
            </div>
            <div class="col-md-6">
                <label class="form-label">User Email</label>
                <input type="email" class="form-control" name="email" autocomplete="off">
            </div>
            <div class="col-md-6">
                <label class="form-label">Mobile</label>
                <input type="text" class="form-control" name="mobile" autocomplete="off">
            </div>
           
            <div class="col-12">
                <label class="form-label">Address</label>
                <input type="text" class="form-control" placeholder="Apartment, studio, or floor" name="address" autocomplete="off">
            </div>
            <div class="col-md-6">
                <label class="form-label">City</label>
                <input type="text" class="form-control" name="city" autocomplete="off">
            </div>
            <div class="col-md-2">
                <label class="form-label">Zip</label>
                <input type="text" class="form-control" name="zip" autocomplete="off">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="submit">make public</button>
            </div>
        </form>
    </div>
    <script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
function show() {
    document.getElementById('sidebar').classList.toggle('active');
}
const button = document.getElementById("btn");
const list = document.getElementById("list");
list.style.display = "none";
button.addEventListener("click", (event) => {
    if (list.style.display == "none") {
        list.style.display = "block";
    } else {
        list.style.display = "none";
    }
})
</script>

  </body>
</html>