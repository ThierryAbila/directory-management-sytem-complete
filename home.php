<?php
include 'connect.php';
// logic statment for admin to logging to the dashbaord
session_start();
if(!isset($_SESSION['admin'])){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
         <!-- bootstrap styleling  -->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" >
<link rel="stylesheet" href="home.css">
</head>
<body>
    <!-- inviting the user to the admin dashboard after login -->
    <?php
    echo $_SESSION['admin'];
    ?>
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
<!-- body content -->
<div class="main-context">
            <!-- view box -->
            <div class="boxes">
                <div class="box-info">
                        <span class="text">
                                <h3>Total Records</h3>
                                <hr>
                                <a href="#">View All</a>
                       </span>
                </div>
                <div class="box-info">
                        <span class="text">
                                <h3>Public Records</h3>
                                <hr>
                                <a href="public_display .php">View All</a>
                       </span>       
                </div>
                <div class="box-info">
                        <span class="text">
                                <h3>Private Records</h3>
                                <hr>
                                <a href="private_display.php">View All</a>
                       </span>
                </div>
            </div>
             <!-- view box -->

</div>
<!-- table content -->
<!-- <table class="table">
            <thead>
              <tr>
                <th scope="col">SI no</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col">Zip</th>
              </tr>
            </thead>
            <tbody>
                  <?php
              $sql="select * from `publical`";
              $result=mysqli_query($con,$sql);
              if($result){
              while( $row=mysqli_fetch_assoc($result)){
                  $id=$row['id'];
                  $name=$row['name'];
                  $email=$row['email'];
                  $mobile=$row['mobile'];
                  $address=$row['address'];
                  $city=$row['city'];
                  $zip=$row['zip'];
                  echo '<tr>
                  <th scope="row">'.$id.'</th>
                  <td>'.$name.'</td>
                  <td>'.$email.'</td>
                  <td>'.$mobile.'</td>
                  <td>'.$address.'</td>
                  <td>'.$city.'</td>
                  <td>'.$zip.'</td>
                  <td>
                  <button class="btn btn-primary"><a href="update.php? updateid='.$id.'"class="text-light">update</a></button>
                  <button class="btn btn-danger"><a href="delete.php? deleteid='.$id.'"class="text-light">Delete</a></button>
                  </td>
                </tr>';
              }
              }

                  ?>
                
            </tbody>
          </table>
<!-- table content -->
        <!-- body content -->
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

<!-- Mirrored from www.w3schools.com/howto/tryit.asp?filename=tryhow_js_sidenav by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2020 02:32:21 GMT -->
</html> 
