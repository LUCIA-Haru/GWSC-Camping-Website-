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
                        <a class="gsitem gsitem2" href="Information.php">Information</a>
                        <a class="gsitem gsitem2" href="PitchAvailable.php">Pitch Available</a>
                        <a class="gsitem gsitem2" href="LA.php">Local-Attractions</a>
                        <a class="gsitem gsitem2 active" href="Features.php">Features</a>
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
          
          <li><a href="Features.php" class="active" >Features</a></li>
          
        </ul>
     </div>
    <!-- BreadCrumb Section End -->
    <!-- Features information start -->
    <section class="Feat">
      <h2 class="gwscheader gfocus-in-expand">Features</h2>
      <p class="gwspara">The features of every pitch are here:</p>
        <?php
        $query = "SELECT * FROM Pitch";
        $ret = mysqli_query($connect, $query);
        $count = mysqli_num_rows($ret);
        if ($count==0) {
          echo "<p class= 'Noinfo'>There are no informations of Features right now.Please Try again later!</p>";
        }
        else {
          for ($i=0; $i < $count ; $i+=2 )//row 
          { 
            $query1 = "SELECT Feature1Name, FeaturesImg1,Feature2Name,FeaturesImg2,FeaturesStatus,AdditionalCost FROM Pitch ORDER BY PitchID LIMIT $i,2";

            $ret1 = mysqli_query($connect, $query1);
            $count1 = mysqli_num_rows($ret1);
            
            echo "<div class='Fcolumn'>";
            for ($j=0; $j < $count1 ; $j++)//column
             {
              $data = mysqli_fetch_array($ret1);
              $Feature1Name = $data['Feature1Name'];
                $FImg1 = $data['FeaturesImg1'];
                $Feature2Name = $data['Feature2Name'];
                $FImg2 = $data['FeaturesImg2'];
                $FStatus = $data['FeaturesStatus'];
                $AdditionalCost = $data['AdditionalCost'];
              ?>
              
              <div class="feat-container">
                
                
                  <img src="<?php echo $FImg1 ?>" alt="LA" >
                  <p class="des2">Feature1Name: <b><?php echo $Feature1Name ?></b></p>
                <b class="divider">---------<i class="fa-brands fa-canadian-maple-leaf"></i>---------</b>
                  <img src="<?php echo $FImg2 ?>" alt="LA" >
                  <p class="des2">Feature2Name:  <b><?php echo $Feature2Name ?></b></p>
                <b class="divider">---------<i class="fa-brands fa-canadian-maple-leaf"></i>---------</b>
                <p class="Fstatus">Status:<b><?php echo $FStatus ?>✅</b></p>
                <p class="cost"><b>Additional Cost:$<?php echo $AdditionalCost ?></b></p>
              </div>
              <?php
            }
            echo "</div>";
          }
        }
        ?>
      
    </section>
    <!-- Features information end -->
    <b class="divider ">---------<i class="fa-brands fa-canadian-maple-leaf"></i>---------</b>
    <!-- Wearable start -->
    <section class="wtswrapper ">
         <h3 class="gwscheader">Wearable Technology While Camping</h3>
      <div class="wtscontainer">
            
 						<div class="wts">
              <img src="./GWS/sw1.jpg" alt="technology">
 						  <div class="wts-info" >
	 						<h4 class="wts-data">Neck Fan</h4>
	 					  </div>
            </div>
 						<div class="wts">
              <img src="./GWS/swa2.jpg" alt="technology">
 						  <div class="wts-info" >
	 						<h4 class="wts-data">Head Gear <br> with Light</h4>
	 					  </div>
            </div>
 						<div class="wts">
              <img src="./GWS/sw3.png" alt="technology">
 						  <div class="wts-info" >
	 						<h4 class="wts-data">GPS Navigator</h4>
	 					  </div>
            </div>
 						<div class="wts">
              <img src="./GWS/sw4.webp" alt="technology">
 						  <div class="wts-info" >
	 						<h4 class="wts-data">Smart Watch</h4>
	 					  </div>
            </div>
	 		</div>
    </section>
   <b class="divider ">---------<i class="fa-brands fa-canadian-maple-leaf"></i>---------</b>
    <!-- Wearable end -->
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
             
            <p>You are here at the <span>Features</span> Page</p>
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