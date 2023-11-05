<?php
session_start();

include('Connection.php');
if (!isset($_SESSION['CId'])) {
    echo "<script>window.alert('Please Login!')</script>";
    echo "<script>window.location='CustomerLogin.php'</script>";
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
                      
                        <a class="gsitem gsitem2 "  href="Home.php">Home</a>
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
         
          <li><a href="Policy.php" class="active">Privacy Policy</a></li>
        </ul>
        
     </div>
      
     
    <!-- BreadCrumb Section End -->
    <!-- Policy start -->
    <div class="gwscpolicy">
      <h3 class="gwscheader">Privacy & Policy</h3>
    <div class="pcontent">
        <h3>Rules and Regulations</h3>
          <p class="pp">
              To ensure a quality camping experience and to protect the park’s natural resources, visitors are asked to abide by the following rules. For more information or assistance, please contact park staff.
          </p>
          <ul>
              <li class="pitem">
                  Camp only in designated campsites. Select an unoccupied campsite and verify availability with park staff before setting up camp. Check-in procedures are outlined on the campground entrance sign.
              </li>
              <li class="pitem">
                  Maximum typical campsite capacity is limited to two sleeping units (only one of which can be wheeled), two vehicles (non-sleeping units), and six people; capacity is doubled for a family campsite. Exceeding the physical design of the campsite will result in additional fees.
              </li>
              <li class="pitem">
                  Excessive volumes on radios, televisions, musical instruments, etc., are not permitted. Shutdown of these items may be necessary depending on your proximity to other campers. Quiet hours are from 10 p.m. to 6 a.m. Generators are prohibited during these hours, and some parks do not allow generators at any time. Non-camping visitors must leave by 10 p.m.
              </li>
              <li class="pitem">
                  The discharging of firearms, BB guns, paintball guns, bows, slingshots, or any devices that use burning powder, explosives (including fireworks), compressed gases, etc., is prohibited.
              </li>
          </ul>
          <h3>Refund Policy</h3>
          <p>Refunds are considered on a case by case basis. Refunds will not be issued due to weather or mosquitoes.</p>
          <h3>CampFires</h3>
          <p>All campgrounds fires are subject to fire restrictions.
            All permitted camping fires must be contained within the fire ring.
            Trash burning is prohibited.
            All fires must be out by 11:30pm.
            Firewood is a major carrier of exotic insects and tree diseases. Do not bring firewood from out of state locations.
          </p>
      </div>
    </div>
    <!-- Policy end -->
    
    
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
            <p>You are here at the <span>Policy</span> Page</p>
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