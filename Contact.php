<?php
session_start();

include('Connection.php');
if (!isset($_SESSION['CId'])) {
    echo "<script>window.alert('Please Login!')</script>";
    echo "<script>window.location='CustomerLogin.php'</script>";
}
if (isset($_POST['btncontact'])) {
  $sub = $_POST['csub'];
  $msg = $_POST['cmsg'];
  $date = $_POST['cdate'];
  $policy = $_POST['policy'];
  $cid = $_POST['txtCID'];

  $insert = "INSERT INTO contact (CustomerID,ContactSubject,ContactMessage,InquiryDate,PrivacyPolicy) Values ('$cid','$sub','$msg','$date','$policy')";
  $query = mysqli_query($connect, $insert);
  if ($query) {
            echo "<script>window.alert('Send Message Successfully.')</script>";
            echo "<script>window.location='Contact.php'</script>'";
        }
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
                        <a class="gsitem gsitem2 active" href="Contact.php">Contact Us</a>
                        <a class="gsitem gsitem2" href="CustomerLogin.php">Login</a>
                            
                    </div> 
                </div>
            </nav>
          
        </header>
    
    <!-- header section end -->
    <!-- BreadCrumb Section Start -->
     <div class="bread rbread">
       <ul class="breadcrumbs">
          <li><a href="Home.php" >Home</a></li>
          <li><a href="Contact.php" class="active">Contact</a></li>
        </ul>
        
     </div>
      
     
    <!-- BreadCrumb Section End -->
    <!-- Contact us start -->
    <section class="main_contact">
      <h2 class="gwscheader gfocus-in-expand">~Contact Us~</h2>
      
      <div class="contactform">
        <div class="cvideo-container">
          <video src="./GWS/Camp- Trim.MOV"loop autoplay muted></video>
          <h3>GWSC</h3>
        </div>
        <div class="g-contact">
          <form action="Contact.php" method="POST">
            <h3>Contact Form</h3>
            <input type="hidden"  name="txtCID" value="<?php echo $_SESSION['CId']?>">
           
              
              <input type="text" class="box" placeholder="Enter Your Subject:" name="csub" required>
            
              <textarea class="box"  placeholder="Enter Your Message:" name="cmsg" required></textarea>
             
              <input type="Date" class="box"  name="cdate" required>
            
            <div class="policy">
              <input type="checkbox" name="policy" value="Accepted" >
              <a href="policy.php">Privacy Policy</a>
            </div>
            <div class="btn-gp">
              <button class="sendbtns1 btn-hover" type="submit" name="btncontact">
                <span class="sending"  >
                  Send Message
                </span>
                <i class="fa-solid fa-paper-plane"></i>
                <span class="sent">Message Sent</span>
              </button>
              <button type="reset" class="btn-hover btn">Reset</button>
            </div>
            <!-- 
                        <button name="btncontact" type="submit" class="btn-hover btn">Send</button>
                        <button type="reset" class="btn-hover btn">Reset</button>
             -->
          </form>
        </div>
        
      </div>
    </section>
    
    <!-- Contact us end -->
    
    
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
            <p>You are here at the <span>Contact</span> Page</p>
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