<?php
include('Connection.php');
if(isset($_GET['AID'])){
    $AID = $_REQUEST['AID'];
    $select = "SELECT * FROM Admins Where AdminID = '$AID'";

    $ret = mysqli_query($connect, $select);
    $row = mysqli_fetch_array($ret);
    
    $nAID = $row['AdminID'];
    $nAUserName = $row['AdminUserName'];
    $nAEmail = $row['AdminEmail'];

}
if (isset($_POST['btnUpdate'])) {
    $Uid = $_POST['txtAID'];
    $Uname = $_POST['txtAname'];
    $Uemail = $_POST['txtAEmail'];
    

    $update = "Update Admins Set AdminUserName = '$Uname',AdminEmail= '$Uemail' WHERE AdminID = '$Uid'";
    $uret = mysqli_query($connect, $update);
    if ($uret) {
        echo "<script>window.alert('Updated Admin Info Successfully.')</script>";
        echo "<script>window.location='AdminLogin.php'</script>'";
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
          <li><a href="AdminLogin.php" >AdminLogin</a></li>
          <li><a href="AdminDashboard.php">AdminDashboard</a></li>
          <li><a href="AdminLogin.php" >LogIn</a></li>
          <li><a href="AdminUpdate.php" class="active">Admin Update</a></li>
        </ul>
     </div>
    <!-- BreadCrumb Section End -->
    <!-- AdminUpdate section start -->
    <section class="dashboard">
        <div class="process container">
            <form action="AdminUpdate.php" method="POST">
                <div class="sub">
                    
                    <h3>Update the Admin Info!</h3>
                </div>
                <div class="input-group">
                    <input type="hidden" name="txtAID" value="<?php echo $nAID; ?>">
                    <div class="GWSCfield">
                        <div class="form-group">
                                <input type="text" name="txtAname" placeholder="User Name:" class="formsinput"  value="<?php echo "$nAUserName" ?>"required>
                                
                        </div>
                            
                    </div>
                    <div class="GWSCfield">
                        <div class="form-group">
                                <input type="text" name="txtAEmail" value="<?php echo"$nAEmail"?>" placeholder="Email:" class="formsinput"  required>
                                
                        </div>
                            
                    </div>
                    
                    
                    
                    <div class="btn-gp">
                        <button name="btnUpdate" type="submit" class="btn-hover btn" value="Update">Update</button>
                        <button type="reset" class="btn-hover btn" >Reset</button>
                    </div>
                </div>
                
            </form>
        </div>
    </section>
    
    <!-- AdminUpdate section end -->
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
    <button onclick="topFunction()" id="topbtn" title="Go to top"><i class="fa-solid fa-circle-arrow-up"></i></button> 
    <!-- footer section start -->
    <footer class="footer">
        <div class="footer-top">
            
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