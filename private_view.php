<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User avaliable</title>
    <link rel="stylesheet" href="home.css">
    <!-- bootstrap styleling  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" >
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

    <div class="container">
 <table class="table">
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
              $sql="select * from `private`";
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
    </div>
    <!--script code for toggle slide  -->
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
    <!--script code for toggle slide  -->

  </body>
</html>