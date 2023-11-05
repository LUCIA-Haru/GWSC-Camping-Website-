<?php
session_start();

include('Connection.php');
if (isset($_POST['btnsubmit'])) {
    $email = $_POST['txtemail'];
    $password = $_POST['txtpassword'];

    $check = "SELECT * from Customer WHERE CustomerEmail = '$email' AND CustomerPassword = '$password'";
    $query = mysqli_query($connect, $check);
    $count = mysqli_num_rows($query);

    if ($count > 0) {

        $update = "UPDATE Customer set ViewCounts = ViewCounts + 1 WHERE CustomerEmail = '$email' AND CustomerPassword = '$password' ";

        mysqli_query($connect, $update);

        $data = mysqli_fetch_array($query);
        $CId = $data['CustomerID'];
        $CFname = $data['CustomerFirstName'];
        $CLname = $data['CustomerLastName'];
        $Cemail = $data['CustomerEmail'];
        $Caddress = $data['CustomerAddress'];
        $CPhoneNo = $data['CustomerPhoneNo'];

        $_SESSION['CId'] = $CId;
        $_SESSION['CFname'] = $CFname;
        $_SESSION['CLname'] = $CLname;
        $_SESSION['Cemail'] = $Cemail;
        $_SESSION['Caddress'] = $Caddress;
        $_SESSION['CPhoneNo'] = $CPhoneNo;



        echo "<script>window.alert('Customer Login Successfully')</script>";
        echo "<script>window.location='Home.php'</script>";
    } else {
        if (isset($_SESSION['loginError'])) {
            $countError = $_SESSION['loginError'];

            if ($countError == 1) {
                echo "<script>window.alert('Invalid Email or Password!!2');</script>";
                $_SESSION['loginError'] = 2;
            } elseif ($countError == 2) {
                echo "<script>window.alert('Invalid Email or Password (Error 3)');</script>";
                echo "<script>window.location='ctimer.php';</script>";
            } else {
                echo "<script>window.alert('Invalid Email or Password!!');</script>";
                $_SESSION['loginError'] = 1;
            }
        } 
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
                        <a class="gsitem gsitem2" href="Contact.php">Contact Us</a>
                        <a class="gsitem gsitem2 active" href="CustomerLogin.php">Login</a>
                            
                    </div> 
                </div>
            </nav>
          
        </header>
    
    <!-- header section end -->
    <!-- BreadCrumb Section Start -->
     <div class="bread ">
       <ul class="breadcrumbs">
          <li><a href="Home.php" >Home</a></li>
          <li><a href="CustomerLogin.php" class="active" >Login</a></li>
          
        </ul>
     </div>
    <!-- BreadCrumb Section End -->
    <!-- Register Form start-->
    <section class="card ccard">
        <div class="GWSCcard sign-in">
            <form action="CustomerLogin.php" method="POST">
                <fieldset>
                    <legend><h2><i class="fas fa-key"></i></i>Sign In</h2></legend>
                        <div class="GWSCfield">
                            <input type="email" name="txtemail"  placeholder="Email:" class="formsinput"  required>
                            
                        </div>
                        <div class="passcontainer ">
                            <div class="passbox" >
                                <div class="inners"></div>
                                <div><i class="fas fa-lock"></i></div>
                                <div class="passcon">
                                    <input type="password" name="txtpassword" class=" pass" placeholder="Password:" id="pass" required
                                        oninput="textChange()">
                                </div>
                                <div class="spass">
                                    <span class="showPass" >
                                        <img  class="eye-close" id="img1" src="https://i.postimg.cc/HWMtCN1m/eye-close.png" alt="eye" 
                                            onclick="toggle()"
                                            >
                                    </span>
                                </div>    
                            </div>
                            
                        </div>

                        
                        
                        <div class="btn-gp">
                            <button name="btnsubmit" type="submit" class="btn-hover btn">Sign In</button>
                            <button type="reset" class="btn-hover btn">Reset</button>
                        </div>
                    
                        
                    
                        <p class="link-signup">
                            Don't have an account?
                            <a href="CustomerRegister.php">Sign Up!</a>
                        </p> 

                </fieldset>
                
                
            </form>
            
        </div>
        
    </section>
        
   
    <!-- Register Form End-->
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
            <p>You are here at the <span>CustomerLogin</span> Page</p>
            <hr>
            <div id="google_translate_element"></div>
            
                <b class="divider">---------<i class="fa-brands fa-canadian-maple-leaf"></i>---------</b>
             
            
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