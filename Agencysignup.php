<?php include "header.php";
?>
    <!-- ------------------------------------------/header------------------- -->
    <!-- -----------------------------------------Users------------------------- -->
    <div id="admin-content">
        <div class="container userbody">
            <div class="row">
                <div class="adduser">
                  
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                        <div class="file">
                            <h2>Sign Up As Agency Member</h2>
                        </div>
                        <div class="input"> Name</div>
                        <input type="text" name="name" onblur="blurfunction(this)" required>
                        <div class="line"></div>

                        <div class="input"> Email</div>
                        <input type="email" name="email" onblur="blurfunction(this)" required>
                        <div class="line"></div>
                       
                        <div class="input">Password
                        </div>
                        <input type="password" name="password" autocomplete="off" onblur="blurfunction(this)" required>
                        <div class="line"></div>
                       
                        <div class="submit">
                            <input type="submit" value="ADD" id="submit" name="submit">
                        </div>
                        <div class="input">
                            <a href="signup.php" class="link">Sign Up as Customer</a>

                        </div>
                    </form>
                       <!-- --------------------------------Script------------- -->
                <script>

        // --------Transfer Input Line-------------
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
  
                <!-- --------------------------------Script-------------+ -->
                  <!-- -----------------------SELF--------- -->
                  <?php
                    if(isset($_POST['submit'])){
                        include "config.php";
                       

                        $name=mysqli_real_escape_string($conn,$_POST['name']);
                        $email=mysqli_real_escape_string($conn,$_POST['email']);
                        $password=md5(mysqli_real_escape_string($conn,$_POST['password']));
                        $role= 1;
                        $query2="SELECT email FROM users WHERE email='$email'";
                        $result2=mysqli_query($conn,$query2)or die("Query Failed");
                        if(mysqli_num_rows($result2)>0){
                        echo " <div class='failed' style='margin-top:-10px;'><p> *Email already exist.</p></div>";
                        }
                        else{
                            
                        $query1="INSERT INTO users(name,email,password,role)
                        VALUE('$name','$email','$password','$role')";
                        mysqli_query($conn,$query1)or die("Query Failed");
                        echo " <div class='failed' style='margin-top:-10px;'><p>Successfully added, please login</p></div>";
                        }
                        
                     }
                ?>
                  <!-- -----------------------SELF--------- -->
     </div>
               
    <!-- --------------------------------------footer----------------- -->
   
    <!-- Footer -->
    <?php include "footer.php"; ?>
    <!-- /Footer -->