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
                    <h2>CAR DETAILES</h2>
                <?php  include "config.php";
                    if(isset($_GET['page'])){
                        $page=$_GET['page'];
                    }
                    else{
                        $page=1;
                    }
                    $limit=5;
                    $offset=($page-1)*$limit;
                     $sql1="SELECT * FROM cardetailes ORDER BY carid DESC LIMIT {$offset},{$limit}";
                    $result1=mysqli_query($conn,$sql1)or die("Query Failed 30");
                    $offset++;
                    if(mysqli_num_rows($result1)>0){
                    ?>
                    <table class="content-table">
                        <thead>
                            <th>S.No.</th>
                            <th>Vehical Name</th>
                            <th>Vehical Number</th>
                            <th>Capacity</th>
                            <th>Rent/Day(Rs)</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                        <?php while($row1=mysqli_fetch_assoc($result1)){
                            
                                $update="update-car.php?post_id=".$row1['carid'];
                                $delete="delete-car.php?post_id=".$row1['carid'];
                            ?>
                            <tr>
                                <td class='id'><?php echo $offset++; ?></td>
                                <td><?php echo $row1['Model']; ?> </td>
                                <td><?php echo $row1['Vehical_no']; ?></td>
                                <td><?php echo $row1['Capacity']; ?></td>
                                <td><?php echo $row1['Rent_day'] ?></td>
                                <td class='edit'><a href="<?php echo $update; ?>"><i class='fa fa-edit'></i></a></td>
                                <td class='delete'><a href="<?php echo $delete; ?>"><i class='fa fa-trash'></i></a>
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
                        $sql2="SELECT carid FROM cardetailes";     
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