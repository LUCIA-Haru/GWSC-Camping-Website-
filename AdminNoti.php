<?php
session_start();
include("Connection.php");

$id=$_SESSION['Aid'];
$adminName = $_SESSION['Aname'];
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
          <li><a href="AdminDashboard.php">AdminDashboard</a></li>
          <li><a href="AdminNoti.php" class="active">Notification</a></li>
        </ul>
     </div>
    <!-- BreadCrumb Section End -->
    <!-- Noti Section Start -->
        <div class="noticontainer ">
            <h3 class="gwscheader">Views The Customers' Submit Contact Information</h3>
            <div class="notiwrapper">
              <?php 
              $sql = "SELECT * FROM contact ";
                $result = mysqli_query($connect, $sql);
                $count = mysqli_num_rows($result);
              if ($count==0) {
                echo "<p>There is no admin's information</p>";
            }
            ?>
            <div class="alllist" >
                <div class="listing"> 
                    <div class="Title">InquiryID</div>
                    <div class="Title">CustomerID</div>
                    <div class="Title">CustomerSubject</div>
                    <div class="Title">ContactMessage</div>
                    <div class="Title">InquiryDate</div>
                    <div class="Title">PrivacyPolicy</div>
                    
                </div>
                <?php
                    for ($i=0; $i < $count ; $i++) {
                    $data = mysqli_fetch_array($result);
                    
                    $inquiryID = $data['InquiryID'];
                    $cid = $data['CustomerID'];
                    $subject = $data['ContactSubject'];
                    $cmsg = $data['ContactMessage'];
                    $date = $data['InquiryDate'];
                    $policy = $data['PrivacyPolicy'];
                    

                    echo "<div class= 'listing'>";
                    echo "<div class='items'>$inquiryID</div>";
                    echo "<div class='items'>$cid</div>";
                    echo "<div class='items'>$subject</div>";
                    echo "<div class='items'>$cmsg</div>";
                    echo "<div class='items'>$date</div>";
                    echo "<div class='items'>$policy</div>";
                    

                    

                    echo "</div>";
                    }
                    
                
                ?>
            </div>
            </div> 
        </div>
         
     <!-- Noti Section End --> 
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