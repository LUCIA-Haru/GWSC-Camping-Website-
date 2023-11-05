<?php
session_start();

include('Connection.php');

if (isset($_GET['PID'])) {
  $PID = $_GET['PID'];

  $query = "SELECT p.* ,pt.*, s.* FROM Pitch p, PitchType pt, Campsite s WHERE p.PTID = pt.PTID 
  AND p.SiteCodeNo = s.SiteCodeNo 
  AND p.PitchID = '$PID'";
  $query2 = mysqli_query($connect, $query);
  $data = mysqli_fetch_array($query2);
  $PitchName = $data['PitchName'];
  $PitchLocation = $data['PitchLocation'];
  $PTName = $data['PTName'];
  $PTDes = $data['PTDescription'];
  $swim = $data['Swimming'];
  $pet = $data['PetFriendly'];
  $SName = $data['SiteName'];
  $SDes = $data['SiteDescription'];
  $Pdes = $data['PitchDescription'];
  $Pdura = $data['PitchDuration'];
  $PStatus = $data['PitchStatus'];
  $PPrice = $data['PitchPricePerNight'];
  $PImg = $data['PitchImg'];
  $LA_Names = $data['LA_Names'];
  $LAImg1 = $data['LA_ImgURL1'];
  $LAimg1Des = $data['LA_ImgDescription1'];
  $LAImg2 = $data['LA_ImgURL2'];
  $LAimg2Des = $data['LA_ImgDescription2'];
  $LAImg3 = $data['LA_ImgURL3'];
  $LAimg3Des = $data['LA_ImgDescription3'];
  $Feature1Name = $data['Feature1Name'];
  $FImg1 = $data['FeaturesImg1'];
  $Feature2Name = $data['Feature2Name'];
  $FImg2 = $data['FeaturesImg2'];
  $FStatus = $data['FeaturesStatus'];
  $AdditionalCost = $data['AdditionalCost'];
}
else{
  echo "
  <script>window.alert('There are no pitch details currently.')</script>";
}
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
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0"
    />
        <!-- translate -->
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</head>

<body>
    <!-- Main wrapper start -->
    <div class="mainwrapper">
    <!-- header section start -->
        <header class="header" id="header">
            <nav id="gnav">
                <div class="navbar" >
                    <i class='bx bx-menu sidebarOpen' ></i>
                    
                    
                    <div class="menu">
                        <div class="logo-toggle">
                          
                            <i class='bx bx-x sidebarClose'></i>
                        </div>
                        
                        <a class="gbrandlogo gsitem" href="Home.php"><span>G</span>WS<Span>C</Span></a>
                      
                        <a class="gsitem gsitem2"  href="Home.php">Home</a>
                        <a class="gsitem gsitem2" href="Information.php">Information</a>
                        <a class="gsitem gsitem2" href="PitchAvailable.php">Pitch Available</a>
                        <a class="gsitem gsitem2" href="LA.php">Local-Attractions</a>
                        <a class="gsitem gsitem2" href="Features.php">Features</a>
                        <a class="gsitem gsitem2" href="Reviews.php">Reviews</a>
                        <a class="gsitem gsitem2" href="Contact.php">Contact Us</a>
                        <a class="gsitem gsitem2" href="CustomerLogin.php">Login</a>
                            
                    </div> 
                </div>
            </nav>
          
        </header>
    
    <!-- header section end -->
    <!-- BreadCrumb Section Start -->
     <div class="bread">
       <ul class="breadcrumbs">
          <li><a href="Home.php" >Home</a></li>
          <li><a href="information.php"  >Information</a></li>
          <li><a href="Details.php" class="active" >Details</a></li>
          
        </ul>
     </div>
    <!-- BreadCrumb Section End -->
    <!-- Details information start -->
    <section class="deatils">
    <form action="Details.php" method="POST">
      <div class="detailinfo">
        <h2 class="gwscheader gfocus-in-expand">~Pitch Details for <?php echo $PitchName ?>~</h2>
        <div class="detailstop">
            <div class="pdetails d-all">
              <p class="pdata">Pitch Information:</p>
              <img class="pimg" src="<?php echo $PImg ?>" alt="gws">
              <br>
              
            
              <p class="data">Status: <span class="status"><?php echo $PStatus ?></span>✅</p>
              <p class="data"> Description: <span class="pdatalist"><?php echo $Pdes ?></span> </p>
              <p class="data" >Price: <span class="price">$<?php echo $PPrice ?></span></p>
              <p class="data">Duration: <span class="pdatalist"><?php echo $Pdura ?></span> </p>
              <iframe class="map" src="<?php echo $PitchLocation?>"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <b class="divider">---------<i class="fa-brands fa-canadian-maple-leaf"></i>---------</b>
            <div class="otherdata d-all">

              <p class="names">Pitch Types Information:</p>
              <p class="data">Name: <span class="pdatalist"><?php echo $PTName ?></span> </p>
              <p class="data">Description:<span class="pdatalist"><?php echo $PTDes ?></span></p>
              <p class="data">Swimming:<span class="pdatalist"><?php echo $swim ?>🏊🏻‍♀️</span></p>
              <p class="data">Pet Friendly:<span class="pdatalist"><?php echo $pet ?>🐕</span></p>
              <hr class="divider">
              <p class="names">Campsite Information:</p>
              <p class="data">Name: <span class="pdatalist"><?php echo $SName ?></span></p>
              <p class="data">Decription: <span class="pdatalist"><?php echo $SDes ?></span></p>
            </div>
            <b class="divider">---------<i class="fa-brands fa-canadian-maple-leaf"></i>---------</b>
            <div class="Ladetails d-all">
              <p class="names">Local-Attractions Names:<?php echo $LA_Names ?></p>
              <p class="names">Images:</p>
              <img class="laimg" src="<?php echo $LAImg1 ?>" alt="gws">
              <img class="laimg" src="<?php echo $LAImg2 ?>" alt="gws">
              <img class="laimg" src="<?php echo $LAImg3 ?>" alt="gws">
              <br>
              <a href="LA.php">See details!</a>
            </div>
            <b class="divider">---------<i class="fa-brands fa-canadian-maple-leaf"></i>---------</b>
            <div class="Fdetails d-all">
              <p class="names">Feature 1 Name: <?php echo $Feature1Name ?></p>
              <img class="fimg" src="<?php echo $FImg1 ?>" alt="gws">
              <p class="names">Feature 2 Name: <?php echo $Feature2Name ?></p>
              <img class="fimg" src="<?php echo $FImg2 ?>" alt="gws">
              <p class="data">Status: <span class="status"><?php echo $FStatus ?></span>✅</p>
              <p class="data">Additional Cost: <span class="price">$<?php echo $AdditionalCost ?></span></p>
              <br>
              <a href="Features.php">See details!</a>
            </div>
            
            <div class="btn-gp">
              <button type="submit" class="btn-hover btn"><a href="Booking.php?PID=<?php echo $PID ?>">Booking</a></button>
            </div>
        </div>
      </div>
    </form>
    </section>
    <!-- Details information end -->
    <button onclick="topFunction()" id="topbtn" title="Go to top"><i class="fa-solid fa-circle-arrow-up"></i></button> 
    <!-- footer section start -->
    <footer class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="footer-item">
                    <h3 class="gbrandlogo">
                        <span>G</span>WS<Span>C</Span>
                    </h3>
                    
                    <ul>
                        <li><a href="Home.php#aboutus">about us</a></li>
                        <li><a href="Home.php#act">Activities</a></li>
                        <li><a href="information.php">Pitch Types</a></li>
                        <li><a href="Features.php">Features</a></li>
                        <li><a href="Policy.php">Privacy and Policy</a></li>
                    </ul>
                </div>
                <div class="footer-item">
                    <h3>Contact Us</h3>
                    <ul>
                        <li>Email: <b class="cs">gwsc2014@gmail.com</b></li>
                        <li>PhoneNo: <b >(+95)096327879524</b></li>
                        <li>Location: <b >Brooklyn A2,USA</b></li>
                        <img src="./GWS/payment.png" alt="pay">
                    </ul>
                    
                </div>
                <div class="footer-item">
                    <h3>get in touch</h3>
                  <ul>
                    <li>
                      <a href="#"
                        ><i class="fab fa-linkedin social-icon"> </i>linkedin</a
                      >
                    </li>
                    <li>
                      <a href="#"
                        ><i class="fab fa-facebook social-icon">
                          
                        </i>facebook</a
                      >
                    </li>
                    <li>
                      <a href="#"
                        ><i class="fab fa-twitter social-icon"> </i>twitter</a
                      >
                    </li>
                    <li>
                      <a href="#"
                        ><i class="fab fa-instagram social-icon">
                          </i
                        >instagram</a
                      >
                    </li>
                    <li>
                      <a href="#"
                        ><i class="fab fa-youtube social-icon"> </i>youtube</a
                      >
                    </li>
                  </ul>
                    
                </div>
            </div>
            <p>You are here at the <span>Details</span> Page</p>
            <div id="google_translate_element"></div>
            
                <b class="divider">---------<i class="fa-brands fa-canadian-maple-leaf"></i>---------</b>
             
            
            <hr>
            <p class="CopyRIght">&copy; 2023 <span class="gbrandlogo"><span>G</span>WS<Span>C</Span></span> | All Rights Reserved.</p>
            <p>This is An Education Website.</p>
        </div>
    </footer> 
    <!-- footer section end-->
    </div>
    <!-- Main wrapper end -->
    
    <script src="script.js"></script>
    
    <script type="text/javascript"></script>
</body>
</html>