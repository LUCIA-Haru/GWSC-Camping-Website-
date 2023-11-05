<?php
session_start();

include('Connection.php');
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
        \
</head>

<body>
    <!-- Main wrapper start -->
    <div class="mainwrapper ">
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
                      
                        <a class="gsitem gsitem2 active"  href="Home.php">Home</a>
                        <a class="gsitem gsitem2 " href="Information.php">Information</a>
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
    <div class="cookiewrapper" id="cookiewrapper">
      <div class="cookieicon">
        <i class="bx bx-cookie"></i>
          <h2>Cookies Consent</h2>
      </div>
      
      <div class="gcookiedata">
          <p>This website use cookies to help you have a superior and more relevant browsing experience on the website. <a href="Policy.php"> Read more...</a></p>
      </div>

      <div class="btn-gp">
          <button class="btn btn-hover cbtn" id="acceptBtn">Accept</button>
          <button class="btn btn-hover cbtn" id="declineBtn">Decline</button>
      </div>
    </div>
    <br>
    <br>
    <br>
    
    
     
    <!-- view -->
    <div class="view">
      
        <?php

          if (!isset($_SESSION['CId'])) {
            echo "<script>alert('Please Login!')</script>";
          }
          else{
            $CId = $_SESSION['CId'];
            $select = "SELECT * FROM Customer WHERE CustomerID = '$CId'";
            $query = mysqli_query($connect, $select);
            $count = mysqli_num_rows($query);

            if ($count>0) {
              $data = mysqli_fetch_array($query);
              $view = $data['ViewCounts'];

              echo "<h3><i class='fa-regular fa-user' ></i>ViewCounts:</h3>".$view;
            }
          }
        ?>
      </div>
    <a href="rss.php" class="rss"><i class="fa-solid fa-square-rss"></i>RSS</a>
    <br>
    <!-- BreadCrumb Section Start -->
     <div class="bread c-bread">
       <ul class="breadcrumbs">
          <li><a href="Home.php" class="active">Home</a></li>
        </ul>
        
     </div>
      
     
    <!-- BreadCrumb Section End -->
    <!-- Slider Banner Start -->
    <section class="s-container underdeco">
      <div class="slide-container active2">
        <div class="slide">
          <div class="s-content">
            <h3>WELCOME TO <span class="gbrandlogo"><span>G</span>WS<Span>C</Span></span></h3>
            <button class="btn"><a href="#aboutus">Learn More!</a></button>
          </div>
          <div class="banner-img">
            <img src="./GWS/slider-2.png" alt="gwsc">
          </div>
        </div>
      </div>
      <div class="slide-container ">
        <div class="slide">
          <div class="s-content">
            <h3>Camp with <Span class="s-2">Loved</Span> Ones</h3>
            <button class="btn"><a href="#aboutus">Learn More!</a></button>
          </div>
          <div class="banner-img">
            <img src="./GWS/slider-4.png" alt="gwsc">
          </div>
        </div>
      </div>
      <div class="slide-container">
        <div class="slide">
          <div class="s-content">
            <h3>CAMP ALONE WITH <span class="s-3">NATURE</span></h3>
            <button class="btn"><a href="#aboutus">Learn More!</a></button>
          </div>
          <div class="banner-img">
            <img src="./GWS/h3.png" alt="gwsc">
          </div>
        </div>
      </div>
      <div class="slide-container">
        <div class="slide">
          <div class="s-content">
            <h3>LET'S SWIM IN THE <SPAN class="s-4">WILD</SPAN></h3>
            <button class="btn"><a href="#aboutus">Learn More!</a></button>
          </div>
          <div class="banner-img">
            <img src="./GWS/s7.png" alt="gwsc">
          </div>
        </div>
      </div>
      <div class="slide-container ">
        <div class="slide">
          <div class="s-content">
            <h3>CAMPING AT THE NIGHT WITH <span class="s-5">STARRY SKY</span></h3>
            <a href="#aboutus" class=" btn">Learn More!</a>
          </div>
          <div class="banner-img">
            <img src="./GWS/slider-5.png" alt="gwsc">
          </div>
        </div>
      </div>
      <div id="prev" onclick="prev()"> < </div>
      <div id="nex" onclick="next()"> > </div>
    </div>
  </section>
    <!-- Slider Banner End -->
    
    
    <!-- Package Start-->
    <div class="display container underdeco">
        <div class="sub">
          <h3>Available Pitches</h3>
        </div>
        <div class="spackage">
            <a href="PitchAvailable.php"><input type="text" name="search" placeholder="Search available.."></a>
        </div>
        <div class="product Manage container">
          <?php
            $query = "SELECT * FROM Pitch ORDER BY PitchID";
            $ret = mysqli_query($connect, $query);
            $count = mysqli_num_rows($ret);

            if ($count == 0) {
                echo "<p>No Pitches are available!</p>";
            } else {
                echo "<div class='prosec'>";
                while ($data = mysqli_fetch_array($ret)) {
                    $PitchID = $data['PitchID'];
                    $PitchName = $data['PitchName'];
                    $PitchPrice = $data['PitchPricePerNight'];
                    $PitchImg = $data['PitchImg'];
            ?>
                    <div class="prosec-wrapper">
                        <div class="prosec-top">
                            <img src="<?php echo $PitchImg ?>" class="M-Image" alt="img">
                        </div>
                        <div class="prosec-bottom btn-gp">
                            <p class="pname"><?php echo $PitchName ?></p><br>
                            <p class="pprice">$<?php echo $PitchPrice ?></p><br>
                            <button class="btn"><a href="Information.php?PID=<?php echo $PitchID ?>">See More>></a></button>
                        </div>
                    </div>
            <?php
                }
                echo "</div>";
            }
            ?>

        </div>
    </div>
    
    <!-- package End-->
    <!-- About us start -->
    <section class="aboutus" id="aboutus">
      <div class="container about">
        
        <div class="circle container">
          <div class="cir-img">
              <div class="circular-img">
                <div class="circular-img-inner">
                   <div class="circular-img-circle"></div>
                   <img src="./GWS/about.png" alt="gws">
                </div>
              </div>
          </div>
        </div>
        <div class="us-content">
          <h3>About Us</h3>
          <p>Since <strong>2014</strong> , we have been pursuing our mission of sharing the joy of nature.  We provide the best attention when providing camping services to people all around the world. You can take part in this serene journey by yourself, with family, friends, or loved ones. You guys can choose from a variety of packages that we offer. <span>Let's embrace nature.</span> </p>
        </div>
      </div>
    </section>
    <!-- About us end -->
    <!-- Activities start -->
    
      
    
    <div class="awrapper" id="act">
      <h3 class="gwscheader gfocus-in-expand">Activities</h3>
      
      
      <div class="acontainer">
        <img src="./GWS/a2.jpg" alt="activities">
        <div class="alay">
          <i class="fa-solid fa-fire"></i>
        </div>
      </div>
      <div class="acontainer">
        <img src="./GWS/a3.jpg" alt="activities">
        <div class="alay">
          <i class="fa-solid fa-person-hiking"></i>
        </div>
      </div>
      <div class="acontainer">
        <img src="./GWS/a4.jpg" alt="activities">
        <div class="alay">
          <i class="fa-solid fa-person-swimming"></i>
        </div>
      </div>
      <div class="acontainer">
        <img src="./GWS/a5.jpg" alt="activities">
        <div class="alay">
          <i class="fa-solid fa-fish"></i>
        </div>
      </div>
      <div class="acontainer">
        <img src="./GWS/a6.jpg" alt="activities">
        <div class="alay">
          <i class="fa-solid fa-person-biking"></i>
        </div>
      </div>
    </div>
    <!-- Activities end -->
    <!-- Video Start -->
      <div class="v-container underdeco">
        <div class="video">
            <iframe src="https://www.youtube.com/embed/2iozAU1mcC8?si=0SuZUG6HbHZf9FSC" title="YouTube video player" allow="accelerometer; autoplay" allowfullscreen></iframe>
        </div>
      </div>
    
    <!-- Video End -->
    
    <!-- Subscribe start -->
    <div class="gsm">
      <div class="scribecontainer">
        <h3>Would you like to know our promotion and activities?</h3>
        <div class="scribe">
          <input type="text" placeholder="Enter your Email.....">
              <div class="btn-gp">
                <button class="sendbtns1 btn-hover" type="submit" name="btnrate" required>
                    <span class="sending"  >
                      Subscribe
                    </span>
                    <i class="fa-solid fa-paper-plane"></i>
                    <span class="sent">Done✔</span>
                </button>
                
              </div>
        </div>
      </div>
      <div class="gmap ">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d105757.27081173284!2d-118.95683630848114!3d34.071700503253595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80e83f33b9501fd9%3A0xe8a6114f3ed959ba!2sSycamore%20Canyon%20Campground!5e0!3m2!1sen!2smm!4v1697037691248!5m2!1sen!2smm"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
    
    <!-- Subscribe end -->
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
            <div id="google_translate_element"></div>
            
                <b class="divider">---------<i class="fa-brands fa-canadian-maple-leaf"></i>---------</b>
             
            <p>You are here at the <span>Home</span> Page</p>
            <hr>
            <p class="CopyRIght">&copy; 2023 <span class="gbrandlogo"><span>G</span>WS<Span>C</Span></span> | All Rights Reserved.</p>
            <p>This is An Education Website.</p>
        </div>
    </footer> 
    <!-- footer section end-->
    </div>
    <!-- Main wrapper end -->
    \
    <script src="script.js"></script>
     
    <script type="text/javascript"></script>

</body>
</html>