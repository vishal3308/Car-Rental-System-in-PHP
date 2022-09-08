<?php include "header.php";

if(isset($_SESSION['role'])){
   
    $userid=$_SESSION['userid'];
}

?>
    <!-- ------------------------------------------/header------------------- -->
    <div id="admin-content">
        <div class="container" style="justify-content: center">
            <div class="row">
               <?php if(isset($_GET['failed'])){
                        echo " <div class='failed' style='margin-top:-10px;'><p>Please select valid Date</p></div>";
               }
               elseif (isset($_GET['booked'])) {
                   echo " <div class='failed' style='margin-top:-10px;'><p>Car Booked successfully</p></div>";
               } 
               ?>
               
                <div class="col-md-12 allcarheading">
                    <h2>AVAILABLE  CARS</h2>
                <?php  include "config.php";
                    if(isset($_GET['page'])){
                        $page=$_GET['page'];
                    }
                    else{
                        $page=1;
                    }
                    $limit=5;
                    $offset=($page-1)*$limit;
                     $sql1="SELECT * FROM cardetailes WHERE Booking_status=0 ORDER BY carid DESC LIMIT {$offset},{$limit}";
                    $result1=mysqli_query($conn,$sql1)or die("Query Failed 30");
                    $offset++;
                    if(mysqli_num_rows($result1)>0){
                        while($row1=mysqli_fetch_assoc($result1)){
                            ?>
                            <div class="availablecar" >
                                <div class="cardetails"><img src="images/background.jpeg" alt="CarImage"></div>
                                <form class="cardetails" action="bookcar.php" method="POST">
                                    
                                    <div class="cardetails2"> <span>Model : </span> <?php echo $row1['Model']; ?> </div>
                                    <div class="cardetails2"> <span>Vehical No : </span> <?php echo $row1['Vehical_no']; ?></div>
                                    <div class="cardetails2"> <span>Capacity : </span><?php echo $row1['Capacity']; ?></div>
                                    <div class="cardetails2"> <span>Rent/Day : </span><?php echo $row1['Rent_day'] ?> Rs</div>
                                    <?php 
                                        if(isset($_SESSION['role'])){
                                    ?>
                                    <input type="number" name="carid" style="display:none" value="<?php echo $row1['carid'] ?>">
                                    <div class="cardetails2"><span>Days for Rent :</span> 
            
                                    <select name="Days" required>
                                    <option selected disabled> Select Days</option>
                                    <?php
                                    for($i=1;$i<=30;$i++){
                                        echo "<option value=$i> $i</option>";
                                    }
                                    ?>
                                    </select>
                                </div>
                                    <div class="cardetails2"><span>Start Date :</span><input type="date" name="start_date" required></div>
                                    <br>
                                    <?php 
                                        if($_SESSION['role']==0){
                                            echo '<input type="submit" value="RENT CAR" id="bookcar">';
                                        }
                                        else{
                                            echo '<input type="submit" value="RENT CAR" id="bookcar" disabled>';
                                        }
                                    }
                                    else{
                                        echo '<a href="login.php">RENT CAR</a>';
                                    }
                                    ?>
                                </form>
                                </div>
                            
                            <?php   }
                        
                     } 
                    else{
                        echo " <div class='failed' style='margin-top:-10px;'><p>No record found.</p></div>";
                    }?>
                    <div class="pagination">
                        <?php 
                        $sql2="SELECT carid FROM cardetailes WHERE Booking_status=0";     
                    $result2=mysqli_query($conn,$sql2)or die("Query Failed");              
                        $total_page=mysqli_num_rows($result2);
                        $limit=5;
                        $offset=ceil($total_page/$limit);
                        echo "<ul>";
                        for ($i=1; $i <=$offset ; $i++) { 
                            echo ' <li class=""><a href="availablecar.php?page='.$i.'">'.$i.'</a></li>';
                        }
                        ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
  <?php include "footer.php"; ?>
    <!-- /Footer -->