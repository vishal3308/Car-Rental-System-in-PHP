<?php include "header.php";
if(isset($_SESSION['role'])){
    if($_SESSION['role']==0){
        header("location: $hostname");
    }
    $userid=$_SESSION['userid'];
}
else{
    header("location: $hostname");
}

?>
    <!-- ------------------------------------------/header------------------- -->
    <div id="admin-content">
        <div class="container">
            <div class="row addcar">
           
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="file">
                    <h2>Add New Car</h2>
                    </div>
                    <div class="inputfield">
                        <label for="Movie Name">Model Name</label>
                        <input type="text" name="model" required autofocus>
                    </div>
                    <div class="inputfield">
                        <label for="Movie Name">Vehical Number</label>
                        <input type="text" name="vehical_no" required>
                    </div>
                   
                    <div class="inputfield">
                        <label>Seating Capacity</label>
                        <input type="number" name="capacity" required>
                    </div>
                    <div class="inputfield">
                        <label>Rent per Day</label>
                        <input type="number" name="rent_day" required>
                    </div>
                  
                    <div class="savepost">
                        <input type="submit" value="SAVE" name="save">
                    </div>
                </form>
                
            </div>
        </div>
    </div>

    <?php 
    include "config.php";
    if(isset($_POST['save'])){

     $model=mysqli_real_escape_string($conn,$_POST['model']);
     $vehical_no=mysqli_real_escape_string($conn,$_POST['vehical_no']);
     $capacity=$_POST['capacity'];
     $rent_day=$_POST['rent_day'];
 
     $query1="INSERT INTO cardetailes(Model,Vehical_no,Capacity,Rent_day,Ownerid)
     VALUE('$model','$vehical_no','$capacity','$rent_day','$userid')";
      mysqli_query($conn,$query1)or die("Query 1 Failed".mysqli_error($conn));
      echo " <div class='failed' style='margin-top:5px;'><p>Successfully added</p></div>";
           
    //   header("location: $hostname");
       mysqli_close($conn);
    }
      ?>
    <?php include "footer.php"; ?>
    <!-- /Footer -->