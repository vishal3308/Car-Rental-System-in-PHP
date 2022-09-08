<?php  include "header.php";
   ?>
    <div class="login_main">
    <div class="adduser login">
        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
        <div class="file">
         <h2>Login As Customer</h2>
           </div>
          
            <div class="input">Email Id
            </div>
            <input type="email" name="email" onblur="blurfunction(this)">
            <div class="line"></div>
            <div class="input">Password
            </div>
            <input type="password" name="password" autocomplete="" onblur="blurfunction(this)">
            <div class="line"></div>
           
            <div class="submit">
                <input type="submit" value="LOGIN" id="submit" name="login">
            </div>
           
        </form>
    </div>
    <!-- --------------------PHP SELF --------------- -->
    <?php
    include "config.php";
    
    if(isset($_POST['login'])){
       
        $email=mysqli_real_escape_string($conn,$_POST['email']);
         $password=md5(mysqli_real_escape_string($conn,$_POST['password']));
        $query1="SELECT id,name,role FROM users WHERE email='$email' AND password='$password'";
        $result1=mysqli_query($conn,$query1)or die("Query Failed");
        if(mysqli_num_rows($result1)>0){
            while($row=mysqli_fetch_assoc($result1)){
        session_start();
        $_SESSION['username']=$row['name'];
        $_SESSION['userid']=$row['id'];
        $_SESSION['role']=$row['role'];
        }

        if($_SESSION['role']==1){
            echo "<script> window.location.replace('/Car_Rent/allcar.php');</script>";
            
          }
          else{
            header("Location: $hostname/availablecar.php");
          }
      }
      else{
        echo " <div class='failed'><p> Username or Password are wrong.</p></div>";
       
      }
     
      mysqli_close($conn);

    }
    ?>
    </div>

    <!-- ----------------------------SCRIPT--------------- -->
    <script>
        let inputdiv = document.querySelectorAll('.input');
        let target = "";
        for (let i = 0; i < inputdiv.length; i++) {
            inputdiv[i].addEventListener("click", function () {
                target = inputdiv[i].nextElementSibling;
                target.focus();
                target.style.height = 30 + "px";
                inputdiv[i].style.transform = "translate(10px,15px)";

            });
        }
        function blurfunction(element) {
            if (element.value == "") {
                element.style.height = 0 + "px";
                target = element.previousElementSibling;
                target.style.transform = "translate(10px,30px)";
            }
        }
        for (let i = 0; i < inputdiv.length; i++) {
            let target_focus = inputdiv[i].nextElementSibling;
            target_focus.addEventListener("focus", function () {
                target_focus.style.height = 30 + "px";
                inputdiv[i].style.transform = "translate(10px,15px)";
            })
        }
    </script>
    <?php include 'footer.php' ?>