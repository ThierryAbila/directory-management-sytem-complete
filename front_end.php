<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- bootstrap styleling  -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" >
<link rel="stylesheet" href="front_end.css">
<title>public_search data</title>


</head>
<body>
<!-- nav bar -->
<div id="navbar">
  <a href="#default" id="logo">Directory Management System</a>
  <div id="navbar-right">
    <a class="active" href="front_end.php">Home</a>
    <a href="#">About</a>
    <a href="login.php">Login</a>
  </div>
</div>
<!-- nav bar -->
<br><br><br>
<!-- search section -->
<div style="margin-top:210px;padding:15px 15px 2500px;font-size:30px">

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

    $sql="select * from `public` where id like '%$search%' or name like '%$search%' or mobile like '%$search%'";

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

<!-- resize function for then nav bar when body content is strowed down -->
<script>
// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("navbar").style.padding = "30px 10px";
    document.getElementById("logo").style.fontSize = "25px";
  } else {
    document.getElementById("navbar").style.padding = "80px 10px";
    document.getElementById("logo").style.fontSize = "35px";
  }
}
</script>

</body>
</html>