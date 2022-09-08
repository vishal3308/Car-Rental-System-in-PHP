<?php 
include "config.php";
session_start();
if(isset($_SESSION['role'])){
    if($_SESSION['role']==0){
        header("location: $hostname");
    }
    $userid=$_SESSION['userid'];
}
else{
    header("location: $hostname");

}
    $post_id=$_GET['post_id'];
    $sql1="DELETE FROM cardetailes WHERE carid='$post_id'";
    mysqli_query($conn,$sql1)or  die("Query1 failed");
    header("location: $hostname/allcar.php?delete=true");
    mysqli_close($conn);
?>