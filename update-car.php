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
                <?php include "config.php";
                if(isset($_GET['post_id'])){
                    $post_id=$_GET['post_id'];
                    $sql1="SELECT * FROM cardetailes WHERE carid='$post_id'";
                    $result1=mysqli_query($conn,$sql1)or die("Query Failed");
                    if(mysqli_num_rows($result1)>0){
                    $row1=mysqli_fetch_assoc($result1);
                ?>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                <div class="file">
                    <h2>Add New Car</h2>
                    </div>
                    <div class="inputfield">
                        <label for="Movie Name">Model Name</label>
                        <input type="text" name="model" required autofocus value="<?php echo $row1['Model'] ?>">
                    </div>
                    <div class="inputfield">
                        <label for="Movie Name">Vehical Number</label>
                        <input type="text" name="vehical_no" required value="<?php echo $row1['Vehical_no'] ?>">
                    </div>
                   
                    <div class="inputfield">
                        <label>Seating Capacity</label>
                        <input type="number" name="capacity" required value="<?php echo $row1['Capacity'] ?>">
                    </div>
                    <div class="inputfield">
                        <label>Rent per Day</label>
                        <input type="number" name="rent_day" required value="<?php echo $row1['Rent_day'] ?>">
                    </div>
                    <div class="savepost">
                        <input type="submit" value="UPDATE" name="update">
                    </div>
                </form>
                <?php } else{
                   echo " <div class='failed' style='margin-top:10px;'><p>No record found on this post id.</p></div>";

                } }?>
            </div>
        </div>
    </div>
    <?php 
    include "config.php";
    if(isset($_POST['update'])){

     $model=mysqli_real_escape_string($conn,$_POST['model']);
     $vehical_no=mysqli_real_escape_string($conn,$_POST['vehical_no']);
     $capacity=$_POST['capacity'];
     $rent_day=$_POST['rent_day'];
 
     $query1="UPDATE cardetailes SET Model='$model',`Vehical_no`='$vehical_no',Capacity='$capacity',`Rent_day`='$rent_day'
      WHERE carid='$post_id'";
      mysqli_query($conn,$query1)or die("Query 1 Failed".mysqli_error($conn));
      echo " <div class='failed' style='margin-top:5px;'><p>Successfully Updated</p></div>";
           
      header("location: $hostname/allcar.php?updated=true");
       mysqli_close($conn);
    }
      ?>

    <!-- Footer -->
    <?php include "footer.php"; ?>
    <!-- /Footer -->