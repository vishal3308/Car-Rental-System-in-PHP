<?php 
include 'config.php';
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN Panel</title>
   
    <link rel="stylesheet" href="CSS file/fontawesome/all.min.css">
    <link rel="stylesheet" href="CSS file/Admin.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- HEADER -->
    <div class="header">
        <!-- container -->
        <div class="container">
            <div class="logo">
                <a href="index.php"><img src="images/vishal.png" alt="logo" width="200px" height="40px"
                        style="border: 5px solid #f8b4b4;"></a>
            </div>
            <div class="nav">
                <ul id="menulist">
                    <li><a href="index.php">Home</a> </li>
                    <li><a href="availablecar.php">Available Car</a></li>
                <?php
                         if(!isset($_SESSION['role'])){
                          echo "<li><a href='login.php'>Login</a> </li>";
                          echo "<li><a href='signup.php'>Sign Up</a> </li>";
                          
                          } else{
                            if($_SESSION['role']==1){
                                echo '<li><a href="allbookedcar.php">View booked cars</a></li>';
                                echo '<li><a href="add-car.php">Add Car</a></li>';
                                echo '<li><a href="allcar.php">All Cars</a></li>';
                            }
                            echo '<li><a href="logout.php">Logout</a></li>';
                        }
                        ?>
                        
                </ul>
            </div>
            <a href="#" id="menutoggle"><img src="images/menu.png" onclick="toggle()"></a>
        </div>
        <script>
            let menuitem = document.getElementById(`menulist`);
            menuitem.style.maxHeight = `0px`;
            function toggle() {
                if (menuitem.style.maxHeight == `0px`) {
                    menuitem.style.maxHeight = `100%`;
                }
                else {
                    menuitem.style.maxHeight = `0px`;
                }}

        </script>
    </div>
   
    <!-- ------------------------------------------/header------------------- -->
   