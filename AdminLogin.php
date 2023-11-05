<?php
session_start();

include('Connection.php');
if (isset($_POST['btnsubmit'])) {
    $email = $_POST['txtemail'];
    $password = $_POST['txtpassword'];

    $check = "SELECT * from Admins WHERE AdminEmail = '$email' AND AdminPassword = '$password'";
    $query = mysqli_query($connect, $check);
    $count = mysqli_num_rows($query);

    if ($count > 0) {

        $data = mysqli_fetch_array($query);
        $Aid = $data['AdminID'];
        $Aname = $data['AdminUserName'];

        $_SESSION['Aid'] = $Aid;
        $_SESSION['Aname'] = $Aname;



        echo "<script>window.alert('Admin Login Successfully')</script>";
        echo "<script>window.location='AdminDashboard.php'</script>";
    } else {
                if (isset($_SESSION['loginError'])) {
            $countError = $_SESSION['loginError'];

            if ($countError == 1) {
                echo "<script>window.alert('Invalid Email or Password (Error 2)');</script>";
                $_SESSION['loginError'] = 2;
            } elseif ($countError == 2) {
                echo "<script>window.alert('Invalid Email or Password (Error 3)');</script>";
                echo "<script>window.location='atimer.php';</script>";
            } else {
                echo "<script>alert('Invalid Email or Password (Default Error)');</script>";
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
          <li><a href="AdminLogin.php" class="active">AdminLogin</a></li>
        </ul>
     </div>
    <!-- BreadCrumb Section End -->
    <!-- Form Section Start -->
    <section class="card">
        <div class="GWSCcard sign-in">
            <form action="AdminLogin.php" method="POST">
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


                        <!-- <div class="GWSCfield">
                            <input type="password" name="txtpassword" class="formsinput" placeholder="Password:" required>
                            
                        </div> -->
                        
                        
                        <div class="btn-gp">
                            <button name="btnsubmit" type="submit" class="btn-hover btn">Sign Up</button>
                            <button type="reset" class="btn-hover btn">Reset</button>
                        </div>
                    
                        
                    
                        <p class="link-signup">
                            Don't have an account?
                            <a href="AdminRegister.php">Sign Up!</a>
                        </p> 

                </fieldset>
                
            </form>
            
        </div>
        
    </section>
    <!-- Form Section End -->
    <!-- admin info listing start -->
    <div class="infolisting">
        <fieldset>
            <legend>Admin Information Listing</legend>
            <?php $select = "SELECT * FROM Admins";
            $ret = mysqli_query($connect, $select);
            $count = mysqli_num_rows($ret);

            if ($count==0) {
                echo "<p>There is no admin's information</p>";
            }
            ?>
            <div class="alllist" >
                <div class="listing"> 
                    <div class="Title">AdminID</div>
                    <div class="Title">AdminUserName</div>
                    <div class="Title">AdminEmail</div>
                    <div class="Title">Action</div>
                    
                </div>
                <?php
                    for ($i=0; $i < $count ; $i++) {
                    $row = mysqli_fetch_array($ret);
                    $AID = $row['AdminID'];
                    $AUserName = $row['AdminUserName'];
                    $AEmail = $row['AdminEmail'];
                    

                    echo "<div class= 'listing'>";
                    echo "<div class='items'>$AID</div>";
                    echo "<div class='items'>$AUserName</div>";
                    echo "<div class='items'>$AEmail</div>";
                    

                    echo "<div class='items'>
                    <a href='AdminUpdate.php?AID=$AID'>Update</a>
                    <a href='AdminDelete.php?AID=$AID'>Delete</a></div>";

                    echo "</div>";
                    }
                    
                
                ?>
            </div>
        </fieldset>
            
     </div>
    <!-- admin info listing end -->
    

    <!-- footer section start -->
    <footer class="admin-footer">
        <div class="admin-footer-top">
            
            
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