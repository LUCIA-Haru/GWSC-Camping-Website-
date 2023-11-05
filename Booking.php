<?php
session_start();

include('Connection.php');

if (!isset($_SESSION['CId'])) {
    echo "<script>window.alert('Please Login!')</script>";
    echo "<script>window.location='CustomerLogin.php'</script>";
}
else{
    if (isset($_REQUEST['PID'])) {
    $PitchID = $_REQUEST['PID'];
    $pitch = "SELECT * FROM pitch WHERE PitchID = '$PitchID'";
    $query = mysqli_query($connect, $pitch);
    $data = mysqli_fetch_array($query);
    // Check if data is not null

    if(!$data){
        echo "<script>window.alert('There is no data!')</script>";
        $data = array();
    }
}
}

if (isset($_POST['btnbooking'])) {
    $pid = $_POST['txtpid'];
    $pname = $_POST['txtpname'];
    $pprice = $_POST['numprice'];
    $cid = $_POST['txtcid'];
    $cfname = $_POST['txtcfname'];
    $pclname = $_POST['txtclname'];
    $caddress = $_POST['txtcaddress'];
    $cemail = $_POST['txtcemail'];
    $cphno = $_POST['txtcphno'];
    $cupemail = $_POST['txtupemail'];
    $cupph = $_POST['txtupph'];
    $date = $_POST['txtdate'];
    $bstatus = $_POST['txtbstatus'];
    $qty = $_POST['numqty'];
    $cardname = $_POST['txtcardname'];
    $cardno = $_POST['txtcardno'];
    $totalamount = $pprice*$qty;
    $tax = $totalamount*0.05;
    $grand = $totalamount + $tax;

    echo $insert = "INSERT INTO Booking(PitchID,CustomerID,BookingDate,BookingStatus,UpdateEmail,UpdatePhoneNo,Quantity,PitchPricePerNight,PaymentType,CardNumber,TotalAmount,Tax,GrandTotal) VALUES ('$pid','$cid','$date','$bstatus','$cupemail','$cupph','$qty','$pprice','$cardname','$cardno','$totalamount','$tax','$grand')";
    $query = mysqli_query($connect,$insert);
        if ($query) {
            echo "<script>window.alert('Booking Successfully.')</script>";
            echo "<script>window.location='information.php'</script>'";
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
                        <a class="gsitem gsitem2" href="PitchAvailable.php">Pitch  Available</a>
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
          <li><a href="Booking.php" class="active" >Booking</a></li>
          
        </ul>
     </div>
    <!-- BreadCrumb Section End -->
    <!-- Booking Start -->
    <section class="booking container">
        <form action="Booking.php" method="POST">
            <fieldset>
                <legend class="gwscheader">Booking Form</legend>
                    
                <div class="bcontainer">
                    <div class="pbook">
                            <h3 >Pitch Details</h3>
                            <input type="hidden" name="txtpid" value="<?php echo     $PitchID ?>" readonly>
                            <br>
                            <label class="blabel">Pitch Name</label>
                            <br>
                            <input type="text" name="txtpname" value="<?php echo $data['PitchName'] ?>" readonly>
                            <br>
                            <label class="blabel">Price Per Night</label>
                            <br>
                            <b>$</b><input type="text" name="numprice" value= "<?php echo $data['PitchPricePerNight'] ?>" readonly>
                    </div>
                     <div class="dividerhidden">
                        <b class="divider">---------<i class="fa-brands fa-canadian-maple-leaf"></i>---------</b>
                    </div>
                    <div class="cbook">
                        <h3>Customer Information</h3>
                            
                            <input type="hidden" name="txtcid" value="<?php echo $_SESSION['CId'] ?>" readonly>
                            <br>
                            <label class="blabel">Customer FirstName</label>
                            <br>
                            <input type="text" name="txtcfname" value="<?php echo $_SESSION['CFname'] ?>" readonly>
                            <br>
                            <label class="blabel">Customer LastName</label>
                            <br>
                            <input type="text" name="txtclname" value="<?php echo $_SESSION['CLname'] ?>" readonly>
                            <br>
                            <label class="blabel">Address</label>
                            <br>
                            <input type="text" name="txtcaddress" value="<?php echo $_SESSION['Caddress'] ?>" readonly>
                            <br>
                            <label class="blabel">Email</label>
                            <br>
                            <input type="text" name="txtcemail" value="<?php echo $_SESSION['Cemail'] ?>" readonly>
                            <br>
                            <label class="blabel">Phone NO</label>
                            <br>
                            <input type="text" name="txtcphno" value="<?php echo $_SESSION['CPhoneNo'] ?>" readonly>
                            <br>
                            <label class="blabel">Update PhoneNo</label>
                            <br>
                            <input type="text" name="txtupph" required>
                            <br>
                            <label class="blabel">Update Email</label>
                            <br>
                            <input type="text" name="txtupemail" required>
                    </div>
                    <div class="dividerhidden">
                        <b class="divider">---------<i class="fa-brands fa-canadian-maple-leaf"></i>---------</b>
                    </div>
                    <div class="bbooking">
                        <h3>Booking Details</h3>
                    
                            <br>
                            <label class="blabel">Booking Date</label>
                            <br>
                            <input type="date" name="txtdate" value="<?php echo date('Y-m-d'); ?>">
                            
                            <input type="hidden" name="txtbstatus" value="CONFIRMED" readonly>
                            <br>
                            <label class="blabel">Quantity</label>
                            <br>
                            <input type="number" name="numqty" min="1" max="5" value="1">
                            <br>
                            <label class="blabel">Payment Type </label>
                            <br>
                            <input type="txt" name="txtcardname" placeholder="CardName" required>
                            <br>
                            <img src="./GWS/payment.png" alt="payment" >
                            
                            
                            <br>
                            <label class="blabel">Card Number</label>
                            <br>
                            <input type="int" name="txtcardno" placeholder="xx-xxxx-xxxx-xxxx" required>
                        
                    
                    </div>
                    

                    
                </div>
                <b class="divider">---------<i class="fa-brands fa-canadian-maple-leaf"></i>---------</b>
                <div class="btn-gp">
                    
                    <button class="sendbtns1 btn-hover" type="submit" name="btnbooking">
                        <span class="sending"  >
                        Book
                        </span>
                        <i class="fa-solid fa-paper-plane"></i>
                        <span class="sent">Booked!💌</span>
                    </button>
                    <!-- <button name="btnbooking" type="submit" class="btn-hover btn">Booked</button> -->
                    <button type="reset" class="btn-hover btn">Reset</button>
                </div>
            </fieldset>
        </form>
    </section>
    <!-- Booking End -->
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
            <p>You are here at the <span>Booking</span> Page</p>
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