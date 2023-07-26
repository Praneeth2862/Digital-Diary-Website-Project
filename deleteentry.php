<?php
require('connection.php');
session_start();
if(!isset($_SESSION['username'])){
    header('location:index.php');
}
$id=$_GET['id'];
$sql="DELETE  FROM entries where eid='$id'";
$result=mysqli_query($conn,$sql);
if($result) header("location:pastentries.php");
else echo"failure";
?>