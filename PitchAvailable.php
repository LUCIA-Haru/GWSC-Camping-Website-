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
                        <a class="gsitem gsitem2 active" href="PitchAvailable.php">Pitch Available</a>
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
          <li><a href="Home.php">Home</a></li>
          <li><a href="PitchAvailable.php" class="active">Pitch Available</a></li>
        </ul>
        
     </div>
      
     
    <!-- BreadCrumb Section End -->
    <!-- Available Start -->
    
    <div class="Available">
      <h3 class="gwscheader">Search Pitch Here</h3>
        <form action="PitchAvailable.php" method="POST">
            <div class="search">
                <div class="bar-col">
                    <div class="bar-row">
                        <input type="text" name="txtSearch" placeholder="Search Here...">
                        
                        
                            <button name="btnSearch" type="submit" class="sbtn"><i class="fa-solid fa-magnifying-glass"></i></button>
                        
                        
                        
                    </div>
                    
                </div>
            </div>
            <?php 
            if (isset($_POST['btnSearch'])) {
                $PitchName=$_POST['txtSearch'];
                $query = "SELECT * FROM pitch WHERE PitchStatus = 'Pending' AND PitchName LIKE '%$PitchName%'";

                $result = mysqli_query($connect, $query);
                $count = mysqli_num_rows($result);

                if($count > 0){
                    echo "<div class='allsearch'>";
                    for ($i=0 ; $i < $count ; $i+=2 ) {
                        $query1 = "SELECT * FROM pitch WHERE PitchStatus='Pending' AND PitchName LIKE '%$PitchName%' LIMIT $i,2";
                        $result1 = mysqli_query($connect, $query1);
                        $count1 = mysqli_num_rows($result1);

                        echo "<div class='csearch'>";
                        for ($j=0; $j < $count1; $j++) {
                            $data = mysqli_fetch_array($result1);
                            echo "<div class='rsearch'>";
                           
                            echo "<img src='".$data['PitchImg']."'>";                           
                            echo "<br>";
                            echo "<b>".$data['PitchName']."</b>"; 
                            echo "<br>";
                            echo "$";echo "<b>".$data['PitchPricePerNight']. "</b>"; 
                              echo "<br>";
                             echo "<a href ='Details.php?PID=".$data['PitchID']."'>Details</a>";
                            echo "</div>"; 
                        }
                        echo"</div>";
                    } 
                    echo"</div>"; 
                }
                else
                {
                    echo "<h1><u>Search Another One!</u></h1>";
                }
            }
          
            ?>
        </form>
    </div>
    <!-- Available End -->
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
            <p>You are here at the <span>PitchAvailable</span> Page</p>
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