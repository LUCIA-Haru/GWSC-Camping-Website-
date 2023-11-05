<?php
session_start();
include('Connection.php');
$randomCode = rand(1000, 9999);

if (!isset($_SESSION['captcha_code'])) 
{
  $_SESSION['captcha_code'] = $randomCode;
}

 

if (isset($_POST['btnsubmit'])) {
    $name = $_POST["txtCUserName"];
    $email = $_POST["txtCemail"];
    $password = $_POST["txtCpassword"];
    $PhoneNo = $_POST["txtCPhoneNo"];
    $CFName = $_POST["txtCFName"];
    $CLName = $_POST["txtCLName"];
    $NRC = $_POST["txtCNRC"];
    $Address = $_POST["txtCAddress"];
    
    // Captcha
    $userInput = $_POST['captcha'];
    $actualCode = $_SESSION['captcha_code'];
    
    if ($userInput == $actualCode) 
    {
        echo "<script>window.alert('Success')</script>";
        echo "<script>window.location='Home.php'</script>";

    } 

    //validaton
    $checkEmail = "SELECT * FROM Customer WHERE CustomerEmail= '$email'";
    $result = mysqli_query($connect, $checkEmail);
    $count = mysqli_num_rows($result);

    if ($count>0) {
        echo "<script>window.alert('The email is already exist')</script>";
        echo "<script>window.location= 'CustomerRegister.php'</script>";
    }
    else{
        $insert = "INSERT INTO Customer(CustomerUsername,CustomerEmail,CustomerPassword,CustomerPhoneNO,CustomerFirstName,CustomerLastName,CustomerAddress,CustomerNRC,ViewCounts)VALUES('$name','$email','$password','$PhoneNo','$CFName','$CLName','$Address','$NRC',1)";
        $run = mysqli_query($connect,$insert);

        if ($run) {
            echo "<script>window.alert('You have registered successfully!')</script>";
            echo "<script>window.location= 'CustomerLogin.php'</script> ";
        }else{
            echo"<script>window.alert ('Failed to register') </script>" ;
        }
        
    }
    // Clear the CAPTCHA code from the session
    unset($_SESSION['captcha_code']);
    
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
                        <a class="gsitem gsitem2 " href="Reviews.php">Reviews</a>
                        <a class="gsitem gsitem2" href="Contact.php">Contact Us</a>
                        <a class="gsitem gsitem2" href="CustomerLogin.php">Login</a>
                            
                    </div> 
                </div>
            </nav>
          
        </header>
    
    <!-- header section end -->
    <!-- BreadCrumb Section Start -->
     <div class="bread ">
       <ul class="breadcrumbs">
          <li><a href="Home.php" >Home</a></li>
          <li><a href="CustomerLogin.php" >Login</a></li>
          <li><a href="CustomerRegister.php" class="active">Register</a></li>
        </ul>
     </div>
    <!-- BreadCrumb Section End -->
    <!-- Register Form start-->
    <section class="card">
        <div class="GWSCcard sign-up">
            <form action="CustomerRegister.php" method="POST">
                <fieldset>
                <legend><h2><i class="fas fa-user"></i>Sign Up</h2></legend>
                <div class="GWSCfield">
                    <input class="formsinput"  type="text" autocomplete="off" name="txtCUserName"  placeholder="Username:" required>
                    
                </div>
                
                <div class="GWSCfield">
                    <input class="formsinput"  type="text" autocomplete="off" name="txtCPhoneNo" placeholder="PhoneNO:" required>
                    
                </div>
                <div class="GWSCfield">
                    <input class="formsinput"  type="text" autocomplete="off" name="txtCFName"  placeholder="Firstname:"required>
                    
                </div>
                <div class="GWSCfield">
                    <input class="formsinput"  type="text" autocomplete="off" name="txtCLName"  placeholder="Lastname:"required>
                    
                </div>
                <div class="GWSCfield">
                    <input class="formsinput"  type="text" autocomplete="off" name="txtCNRC" placeholder="NRC:" required>
                    
                </div>
                <div class="GWSCfield">
                    <input class="formsinput"  type="text" autocomplete="off" name="txtCAddress" placeholder="Address:"  required>
                    
                </div>
                
                <div class="GWSCfield">
                    <input class="formsinput"  type="text" autocomplete="off" name="txtCemail" placeholder="Email:"required>
                    
                </div>
                <div class="passcontainer ">
                    <div class="passbox" >
                            <div class="inners"></div>
                            <div><i class="fas fa-lock"></i></div>
                            <div class="passcon">
                                <input type="password" name="txtCpassword" class=" pass" placeholder="Password:" id="pass" required
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
                    <div class="passvalidator">
                            <p id="capital">
                                <i class="fas fa-times"></i>
                                <i class="fas fa-check"></i>
                                <span>Upper Case</span>
                            </p>
                            <p id="special-char">
                                <i class="fas fa-times"></i>
                                <i class="fas fa-check"></i>
                                 <span>Special Character</span>
                            </p>
                            <p id="number">
                                    <i class="fas fa-times"></i>
                                    <i class="fas fa-check"></i>
                                    <span>Number</span>
                            </p>
                            <p id="more-than-8">
                                    <i class="fas fa-times"></i>
                                    <i class="fas fa-check"></i>
                                    <span>More than 8 characters</span>
                             </p>
                    </div>
                </div>
                
                <!-- <div class="GWSCfield">
                    <input class="formsinput"  type="password" name="txtAdminpassword" placeholder="Password:">
                    
                </div> -->
                <div class="capcha">
                    <label for="captcha">Enter CAPTCHA code:</label>
                    <label for="captcha"><?php echo "$randomCode"?></label>
                    <input type="text" id="captcha" name="captcha" required>
                    <br>
                    <Input type="checkbox" required> &nbsp;I am not a robot. &nbsp;</Input>
                    <img src="./GWS/cc.png" alt="Captcha">
                </div>

                <div class="btn-gp">
                    <button name="btnsubmit" type="submit" class="btn-hover btn">Sign Up</button>
                    <button type="reset" class="btn-hover btn">Reset</button>
                </div>
                
                    
                </form>
                <p class="link-signup">
                    Already have an account?
                    <a href="CustomerLogin.php">Sign In!</a>
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
            <p>You are here at the <span>Customer Register</span> Page</p>
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
</body>
</html>