<?php
session_start();
include("Connection.php");
$Aid = $_SESSION['Aid'];
$adminNames = $_SESSION['Aname'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GWSC</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Boxicons CSS -->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <!-- Main wrapper start -->
    <div class="mainwrapper">
    <!-- Sidebar Start-->
         <aside class="sbar">
            <div class="logo">
                <div class="gbrandlogo"><span>G</span>WS<span>C</span></div>
            </div>
            <div class="adminlinks">
                <ul class="links">
                    <li>
                        <i class="fa-regular fa-user"></i>
                        <a href="AdminLogin.php">Login</a>
                    </li>
                    <li>
                        <i class='bx bx-edit-alt'></i>
                        <a href="AdminRegister.php">Register</a>
                    </li>
                    <li><i class='bx bxs-dashboard'></i>
                    <a href="AdminDashboard.php">Dashboard</a></li>
                    <li><i class="fa-solid fa-envelope"></i>
                    <a href="AdminNoti.php">Notification</a></li>
                </ul>
                
            </div>
            
            <div class="logout">
               <i class='bx bx-run' ></i>
                <a href="AdminLogout.php">Logout</a>
            </div>
        </aside>
    
    <!-- Sidebar end-->
    <!-- BreadCrumb Section Start -->
    <div class="bread abread">
       <ul class="breadcrumbs">
          <li><a href="AdminLogin.php" >AdminLogin</a></li>
          <li><a href="AdminDashboard.php" class="active">AdminDashboard</a></li>
        </ul>
     </div>
    <!-- BreadCrumb Section End -->
    <!-- DashBoard Section Start -->
   
        <div class="board container">
            <div class="sub">
                <h2><span>Welcome Back From <span class="gbrandlogo"><span>G</span>WS<Span>C</Span></span> Backend Website!</span></h2>
                <h3>~<?php echo $adminNames?>~</h3>
            </div>
            <br>
            <div class="Manage container">
                <h3 class="gwscheader">Manage the process here!</h3>
                <div class="prosec">
                    
                    <div class="prosec-wrapper">
                        <div class="prosec-top">
                            <img src="GWS/pt2.jpg" alt="Pitch" class="M-Image">
                            
                        </div>
                        <div class="prosec-bottom btn-gp">
                            
                            <button class="btn btn-hover"><a href="PitchType.php">Add PitchTypes</a></button>
                            
                        </div>
                        
                    </div>
                    <div class="prosec-wrapper">
                        <div class="prosec-top">
                            <img src="GWS/site.jfif" alt="Pitch" class="M-Image">
                            
                        </div>
                        <div class="prosec-bottom btn-gp">
                             
                            <button class="btn btn-hover"><a href="Campsite.php">Add Campsite</a></button>
                            
                        </div>
                        
                    </div>
                    <div class="prosec-wrapper">
                        <div class="prosec-top">
                            <img src="GWS/pitch1.jfif" alt="Pitch" class="M-Image">
                            
                        </div>
                        <div class="prosec-bottom btn-gp">
                            
                            <button class="btn btn-hover"><a href="pitch.php">Add Pitch</a></button>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- DashBoard Section End --> 
        <button onclick="topFunction()" id="topbtn" title="Go to top"><i class="fa-solid fa-circle-arrow-up"></i></button> 
    <!-- footer section start -->
    <footer class="footer">
        <div class="footer-top">
           
            
<b class="divider">---------<i class="fa-brands fa-canadian-maple-leaf"></i>---------</b>

            <p class="CopyRIght">&copy; 2023 <span class="gbrandlogo"><span>G</span>WS<Span>C</Span></span> | All Rights Reserved.</p>
            <p>This is An Education Website.</p>
        </div>
    </footer> 
    <!-- footer section end-->
    </div>
    <!-- Main wrapper end -->
    
    <script src="script.js"></script>
</body>
</html>