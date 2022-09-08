<?php
include 'config.php';
session_start();
if(isset($_SESSION['role'])){
    if($_SESSION['role']==1){
        header("location:$hostname");
    }
    else{
        $start_date=$_POST['start_date'];
        $today=date("Y-m-d");
        if($today > $start_date){
            header("location:$hostname/availablecar.php?failed=true");
        }
        else{
            $carid=$_POST['carid'];
            $userid=$_SESSION['userid'];
            $days=$_POST['Days'];
             $query="INSERT INTO booked_car(Customer_id,Car_id,Days,Starting_date) VALUE($userid,$carid,$days,STR_TO_DATE('$start_date','%Y-%m-%d'))";
            mysqli_query($conn,$query)or die(mysqli_error($conn));
            $query2="UPDATE cardetailes SET Booking_status=1 WHERE carid=$carid";
            mysqli_query($conn,$query2)or die("Query2 failed ".mysqli_error($conn));
            header("location:$hostname/availablecar.php?booked=true");

        }
        
    }
}
else{
    header("location: $hostname");
}
?>