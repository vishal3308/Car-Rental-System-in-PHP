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
        <div class="container" style="justify-content: center">
            <div class="row">
               <?php if(isset($_GET['delete'])){
                        echo " <div class='failed' style='margin-top:-10px;'><p>Post deleted successfully</p></div>";
               }
               elseif (isset($_GET['updated'])) {
                   echo " <div class='failed' style='margin-top:-10px;'><p>Post Updated successfully</p></div>";
               } 
               ?>
               
                <div class="col-md-12 allcarheading">
                    <h2>BOOKED CAR DETAILES</h2>
                <?php  include "config.php";
                    if(isset($_GET['page'])){
                        $page=$_GET['page'];
                    }
                    else{
                        $page=1;
                    }
                    $limit=5;
                    $offset=($page-1)*$limit;
                     $sql1="SELECT u.name,u.email,Days,Starting_date,c.Model FROM `booked_car` INNER JOIN users as u ON booked_car.Customer_id=u.id INNER JOIN cardetailes as c ON booked_car.Car_id=c.carid ORDER BY Booking_id DESC LIMIT {$offset},{$limit}";
                    $result1=mysqli_query($conn,$sql1)or die("Query Failed 30");
                    $offset++;
                    if(mysqli_num_rows($result1)>0){
                    ?>
                    <table class="content-table">
                        <thead>
                            <th>S.No.</th>
                            <th>Customer Name</th>
                            <th>Customer Email</th>
                            <th>Car Model</th>
                            <th>Starting Date</th>
                            <th>Days</th>
                            
                        </thead>
                        <tbody>
                        <?php while($row1=mysqli_fetch_assoc($result1)){
                            ?>
                            <tr>
                                <td class='id'><?php echo $offset++; ?></td>
                                <td><?php echo $row1['name']; ?> </td>
                                <td><?php echo $row1['email']; ?></td>
                                <td><?php echo $row1['Model']; ?></td>
                                <td><?php echo $row1['Starting_date'] ?></td>
                                <td><?php echo $row1['Days']; ?></td>
            
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                    <?php } 
                    else{
                        echo " <div class='failed' style='margin-top:-10px;'><p>No record found.</p></div>";
                    }?>
                    <div class="pagination">
                        <?php 
                        $sql2="SELECT Booking_id FROM booked_car";     
                    $result2=mysqli_query($conn,$sql2)or die("Query Failed");              
                        $total_page=mysqli_num_rows($result2);
                        $limit=5;
                        $offset=ceil($total_page/$limit);
                        echo "<ul>";
                        for ($i=1; $i <=$offset ; $i++) { 
                            echo ' <li class=""><a href="allcar.php?page='.$i.'">'.$i.'</a></li>';
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