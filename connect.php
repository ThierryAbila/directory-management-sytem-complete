<?php
$con=new mysqli('localhost','root','','dms');

if(! $con){
    die(mysqli_error($con));
}

?>