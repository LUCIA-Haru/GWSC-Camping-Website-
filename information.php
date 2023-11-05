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
                        <a class="gsitem gsitem2 active" href="Information.php">Information</a>
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
          <li><a href="information.php" class="active" >Information</a></li>
          
        </ul>
     </div>
    <!-- BreadCrumb Section End -->
    <!-- Information start -->
    
          
    <section class="information">
    <h2 class="gwscheader gfocus-in-expand">Pitch Information</h2>
    <?php
    $query = "SELECT * FROM pitch";
    $ret = mysqli_query($connect, $query);
    $count = mysqli_num_rows($ret);
    if ($count == 0) {
        echo "<p class='Noinfo'>There are no informations of pitch right now. Please try again later!</p>";
    } else {
        for ($k = 0; $k < $count; $k += 2) {
            echo "<div class='pinfo'>";
            for ($j = 0; $j < 2; $j++) {
                $data = mysqli_fetch_array($ret);
                if (!$data) {
                    break; // Break the loop if no more data is available
                }
                $PID = $data['PitchID'];
                $PName = $data['PitchName'];
                $PitchImg = $data['PitchImg'];
                $FeaturesImg1 = $data['FeaturesImg1'];
                $Feature1Name = $data['Feature1Name'];
                $FeaturesImg2 = $data['FeaturesImg2'];
                $Feature2Name = $data['Feature2Name'];
                $LA_ImgURL1 = $data['LA_ImgURL1'];
                $LA_ImgURL2 = $data['LA_ImgURL2'];
                $LA_ImgURL3 = $data['LA_ImgURL3'];
                $LA_Names = $data['LA_Names'];
                $Location = $data['PitchLocation'];
                $PitchStatus = $data['PitchStatus'];
                ?>
                <div class="pit">
                    <img src="<?php echo $PitchImg ?>" alt="pitch">
                    <br>
                    <iframe class="map" src="<?php echo $Location ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <br>
                    <embed class="fimg" src="<?php echo $FeaturesImg1 ?>" alt="pitch">
                    <embed src="<?php echo $LA_ImgURL1 ?>" alt="pitch">
                    <div class="infodes">
                        <p>The Pitch Name: <?php echo $PName ?></p>
                        <p>Status: <b><?php echo $PitchStatus ?></b></p>
                        <p>Feature 1: <b><?php echo $Feature1Name ?></b></p>
                        <p>Local Attractions: <b><?php echo $LA_Names ?></b></p>
                        
                        
                    </div>
                    <button type="submit" class="btn-hover btn"><a href="Details.php?PID=<?php echo $PID ?>">Details</a></button>
                </div>
                <?php
            }
            echo "</div>";
        }
    }
    ?>
     
    </section>
   
    <!-- Information end -->
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
            <p>You are here at the <span>Information</span> Page</p>
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