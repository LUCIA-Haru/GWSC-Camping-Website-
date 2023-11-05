<?php
session_start();

include('Connection.php');
if (!isset($_SESSION['CId'])) {
    echo "<script>window.alert('Please Login!')</script>";
    echo "<script>window.location='CustomerLogin.php'</script>";
}

if (isset($_POST['btnrate'])) {
  $rate = $_POST['ratings'];
  $feedback = $_POST['txtfeedback'];
  $date = $_POST['txtdate'];
  $cid = $_POST['txtCID'];

  $insert = "INSERT INTO reviews (Rating,Feedback,ReviewDate,CustomerID) VALUES ('$rate','$feedback','$date','$cid')";
  $query = mysqli_query($connect, $insert);
  if ($query) {
            echo "<script>window.alert('Send Ratings Successfully.')</script>";
            echo "<script>window.location='Reviews.php'</script>'";
        }
}

// $sql = "SELECT * FROM reviews ";
// $result = mysqli_query($connect, $sql);
// if($result){
//   $row = mysqli_fetch_array($result);
//   $ratename = $row['Rating'];
//   $feedback = $row['Feedback'];

// }
// else{
//   $ratename = "NO rating available.";
// }


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
                        <a class="gsitem gsitem2 active" href="Reviews.php">Reviews</a>
                        <a class="gsitem gsitem2" href="Contact.php">Contact Us</a>
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
          <li><a href="Reviews.php" class="active" >Reviews</a></li>
          
        </ul>
     </div>
    <!-- BreadCrumb Section End -->
    <!-- Review Start -->
    
    <div class="reviewbg">
      <h3 class="gwscheader gfocus-in-expand">~Reviews Form~</h3>
          <div class="r-result">
            <div class="sub">
              <h3>Feedbacks</h3>
            </div>
            
            <div class="ratingreseult">
              <?php 
              $sql = "SELECT * FROM reviews ";
                $result = mysqli_query($connect, $sql);
                $count = mysqli_num_rows($result);
              if ($count == 0) {
                 echo "<p>No Reviews are available!</p>";
              }
              else{
                for ($i=0; $i <$count ; $i+=3) {
                  $query1 = "SELECT * FROM reviews LIMIT 0,3";
                  $ret1 = mysqli_query($connect, $query1);
                  $count1 = mysqli_num_rows($ret1);
                  echo "<div class='rcolumn'>";
                  for ($j=0; $j <$count1 ; $j++) { 
                    $data = mysqli_fetch_array($ret1);
                    $ratename = $data['Rating'];
                    $feedback = $data['Feedback'];
                    ?>
                    <div class="reviewcontainer">
                        <i class="fa-solid fa-star"><?php echo $ratename ?></i>
                                <br>
                                <i class="fa-solid fa-comment"></i><p><?php echo $feedback ?></p>
                    </div>
                  <?php
                  }
                  echo "</div>";
                }
              }
            ?>
            </div>  
          </div>
          

        <div class="greviews">
          <h3>Rate Your Reviews Here💌</h3>
            <form action="Reviews.php" method="POST">
            <div class="rating">
              <input type="radio" name="ratings" value="5" id="star5"><label for="star5"></label>
              <input type="radio" name="ratings" value="4" id="star4"><label for="star4"></label>
              <input type="radio" name="ratings" value="3" id="star3"><label for="star3"></label>
              <input type="radio" name="ratings" value="2" id="star2"><label for="star2"></label>
              <input type="radio" name="ratings" value="1" id="star1"><label for="star1"></label>
            </div>

            
              <textarea name="txtfeedback" placeholder="Enter your Feedback here" required></textarea><br>
              <input type="date" name="txtdate" required>
              <input type="hidden" name="txtCID" value="<?php echo $_SESSION['CId']?>">

            <div class="btn-gp">
              <button class="sendbtns1 btn-hover" type="submit" name="btnrate">
                  <span class="sending"  >
                    Submit
                  </span>
                  <i class="fa-solid fa-paper-plane"></i>
                  <span class="sent">Done</span>
              </button>
              <button type="reset" class="btn-hover btn">Reset</button>
            </div>
            <!-- <input type="submit" name="btnrate" value="Save"> -->
          </form>
        </div>
    </div>
    <!-- Review End -->
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
            <p>You are here at the <span>Reviews</span> Page</p>
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