<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>private_search data</title>
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
<!-- search section -->
<!-- search section -->
<div style="margin-top:50px;padding:15px 15px 2500px;font-size:30px">

    <h2>Search by Number/Name</h2>
    <hr>
    <form class="example" method="post">
    <input type="text" placeholder="Search.." name="search">
    <button type="submit" name="submit"><i class="fa fa-search"></i>Search</button>
    </form>
    <table class="table">
            <?php
if(isset($_POST['submit'])){
    $search=$_POST['search'];

    $sql="select * from `private` where id like '%$search%' or name like '%$search%' or mobile like '%$search%'";

    $result=mysqli_query($con,$sql);

    if($result){
       if($num=mysqli_num_rows($result)>0){
            echo '<thead>;
            <tr>
            <th>sl </th>
            <th>name</th>
            <th>mobile</th>
            </tr?
            <thead>
            ';
           while( $row=mysqli_fetch_assoc($result)){
            echo '<tbody>
            <tr>
            <td><a href="searchData.php?data='.$row['id'].'">'.$row['id'].'</a></td>
            <td>'.$row['name'].'</td>
            <td>'.$row['mobile'].'</td>
            
            </tr>
            </tbody>';
           }
        }else{
            echo '<h2 class="text-danger">data not found</h2>';
        }
           
    }
}
?>
        </table>
</div>
<!-- search section -->

<!-- search seccion -->
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