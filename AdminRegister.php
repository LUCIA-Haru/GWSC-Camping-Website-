<?php
include('Connection.php');

if (isset($_POST['btnsubmit'])) {
    $name = $_POST["txtAdminUserName"];
    $email = $_POST["txtAdminemail"];
    $password = $_POST["txtAdminpassword"];
    $PhoneNo = $_POST["txtAdminPhoneNo"];
    $FullName = $_POST["txtAdminFullName"];
    $NRC = $_POST["txtAdminNRC"];
    $Address = $_POST["txtAdminAddress"];
    
    //validaton
    $checkEmail = "SELECT * FROM Admins WHERE AdminEmail= '$email'";
    $result = mysqli_query($connect, $checkEmail);
    $count = mysqli_num_rows($result);

    if ($count>0) {
        echo "<script>window.alert('The email is already exist')</script>";
        echo "<script>window.location= 'AdminRegister.php'</script>";
    }
    else{
        $insert = "INSERT INTO Admins(AdminUserName,AdminEmail,AdminPassword,AdminPhoneNO,AdminFullName,AdminNRC,AdminAddress)VALUES('$name','$email','$password','$PhoneNo','$FullName','$NRC','$Address')";
        $run = mysqli_query($connect,$insert);

        if ($run) {
            echo "<script>window.alert('You have registered successfully!')</script>";
            echo "<script>window.location= 'AdminLogin.php'</script> ";
        }else{
            echo"<script>window.alert ('Failed to register') </script>" ;
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
</head>

<body>
    <!-- Main wrapper start -->
    <div class="mainwrapper">
    <!-- Sidebar Start-->
         <aside class="sbar">
            <div class="logo">
                <div class="gbrandlogo"><span>G</span>WS<span>C</span></div>
            </div>
            <div class="adminlinks">
                <ul class="links">
                    <li>
                        <i class="fa-regular fa-user"></i>
                        <a href="AdminLogin.php">Login</a>
                    </li>
                    <li>
                        <i class='bx bx-edit-alt'></i>
                        <a href="AdminRegister.php">Register</a>
                    </li>
                    <li><i class='bx bxs-dashboard'></i>
                    <a href="AdminDashboard.php">Dashboard</a></li>
                    <li><i class="fa-solid fa-envelope"></i>
                    <a href="AdminNoti.php">Notification</a></li>
                </ul>
                
            </div>
            
            <div class="logout">
               <i class='bx bx-run' ></i>
                <a href="AdminLogout.php">Logout</a>
            </div>
        </aside>
    
    <!-- Sidebar end-->
    <!-- BreadCrumb Section Start -->
    <div class="bread abread">
       <ul class="breadcrumbs">
          <li><a href="AdminLogin.php">AdminLogin</a></li>
          <li><a href="AdminRegister.php" class="active">Register</a></li>
        </ul>
     </div>
    <!-- BreadCrumb Section End -->
    <!-- Form Section Start -->
    <section class="card">
        <div class="GWSCcard sign-up">
            <form action="AdminRegister.php" method="POST">
                <fieldset>
                <legend><h2><i class="fas fa-user"></i>Sign Up</h2></legend>
                <div class="GWSCfield">
                    <input class="formsinput"  type="text" autocomplete="off" name="txtAdminUserName"  placeholder="Username:" required>
                    
                </div>
                <div class="GWSCfield">
                    <input class="formsinput"  type="text" autocomplete="off" name="txtAdminFullName"  placeholder="Fullname:"required>
                    
                </div>
                <div class="GWSCfield">
                    <input class="formsinput"  type="text" autocomplete="off" name="txtAdminNRC" placeholder="NRC:" required>
                    
                </div>
                <div class="GWSCfield">
                    <input class="formsinput"  type="text" autocomplete="off" name="txtAdminAddress" placeholder="Address:"  required>
                    
                </div>
                <div class="GWSCfield">
                    <input class="formsinput"  type="text" autocomplete="off" name="txtAdminPhoneNo" placeholder="PhoneNO:" required>
                    
                </div>
                <div class="GWSCfield">
                    <input class="formsinput"  type="text" autocomplete="off" name="txtAdminemail" placeholder="Email:"required>
                    
                </div>
                <div class="passcontainer ">
                            <div class="passbox" >
                                <div class="inners"></div>
                                <div><i class="fas fa-lock"></i></div>
                                <div class="passcon">
                                    <input type="password" name="txtAdminpassword" class=" pass" placeholder="Password:" id="pass" required
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
                
                <div class="btn-gp">
                    <button name="btnsubmit" type="submit" class="btn-hover btn">Sign Up</button>
                    <button type="reset" class="btn-hover btn">Reset</button>
                </div>
                
                    
                </form>
                <p class="link-signup">
                    Already have an account?
                    <a href="AdminLogin.php">Sign In!</a>
                </p> 

                </fieldset>
                
            </form>
            
        </div>
        
    </section>
        
    <!-- Form Section End -->

    <!-- footer section start -->
    <footer class="footer">
        <div class="footer-top">
            
            
<b class="divider">---------<i class="fa-brands fa-canadian-maple-leaf"></i>---------</b>

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