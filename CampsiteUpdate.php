<?php
include('Connection.php');
if(isset($_GET['CaID'])){
    $CaID = $_REQUEST['CaID'];
    $select = "SELECT * FROM Campsite Where SiteCodeNo = '$CaID'";

    $ret = mysqli_query($connect, $select);
    $row = mysqli_fetch_array($ret);
    
    $nsitecode = $row['SiteCodeNo'];
    $nsiteName = $row['SiteName'];
    $nSiteDescription = $row['SiteDescription']  ;
    $nSiteStatus = $row['SiteStatus']  ;

}
if (isset($_POST['btnUpdate'])) {
    $Uid = $_POST['txtCaID'];
    $Uname = $_POST['txtCaname'];
    $Ustatus = $_POST['txtCaStatus'];
    $Udes = $_POST['txtCaDes'];

    $update = "Update Campsite Set SiteName = '$Uname',SiteDescription= '$Udes' , SiteStatus = '$Ustatus' WHERE SiteCodeNo = '$Uid'";
    $uret = mysqli_query($connect, $update);
    if ($uret) {
        echo "<script>window.alert('Updated Campsite Info Successfully.')</script>";
        echo "<script>window.location='Campsite.php'</script>'";
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
          <li><a href="Campsite.php" >Campsite</a></li>
          <li><a href="CampsiteUpdate.php" class="active">Campsite Update</a></li>
        </ul>
     </div>
    <!-- BreadCrumb Section End -->
    <!-- CampsiteUpdate section start -->
    <section class="dashboard">
        <div class="process container">
            <form action="CampsiteUpdate.php" method="POST">
                <div class="sub">
                    
                    <h3>Update the Campsite!</h3>
                </div>
                <div class="input-group">
                    <input type="hidden" name="txtCaID" value="<?php echo $nsitecode; ?>">
                    <div class="GWSCfield">
                        <div class="form-group">
                                <input type="text" name="txtCaname" placeholder="Site Name:" class="formsinput"  value="<?php echo "$nsiteName" ?>"required>
                                
                        </div>
                            
                    </div>
                    <div class="GWSCfield">
                        <div class="form-group">
                                <input type="text" name="txtCaStatus" value="<?php echo"$nSiteStatus"?>" placeholder="Site Status:" class="formsinput"  required>
                                
                        </div>
                            
                    </div>
                    <div class="GWSCfield">
                        <div class="form-group">
                                <input type="text" name="txtCaDes" value="<?php echo"$nSiteDescription"?>" placeholder="Description:" class="formsinput"  required>
                                
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
    
    <!-- CampsiteUpdate section end -->
    <!-- Campsite info listing start -->
    <div class="infolisting">
            <fieldset>
                <legend>Campsite Information Listing</legend>
                <?php $select = "SELECT * FROM campsite";
                $ret = mysqli_query($connect, $select);
                $count = mysqli_num_rows($ret);

                if ($count==0) {
                    echo "<p>There is no Campsite's information</p>";
                }
                ?>
                <div class="alllist">
                    <div class="listing">
                        <div class="Title">SiteCodeNo</div>
                        <div class="Title">SiteName</div>
                        
                        <div class="Title">SiteDescription</div>
                        
                        <div class="Title">SiteStatus</div>
                        <div class="Title">action</div>
                        
                    </div>
                    <?php
                        for ($i=0; $i < $count ; $i++) {
                        $row = mysqli_fetch_array($ret);
                        $sitecode = $row['SiteCodeNo'];
                        $siteName = $row['SiteName'];
                        
                        $SiteDescription = $row['SiteDescription']  ;
                        
                        $SiteStatus = $row['SiteStatus']  ;

                        echo "<div class= 'listing'>";
                        echo "<div class='items'>$sitecode</div>";
                        echo "<div class='items'>$siteName</div>";
                        
                        echo "<div class='items'>$SiteDescription</div>";
                        
                        echo "<div class='items'>$SiteStatus</div>";

                        echo "<div class='items'>
                        <a href='CampsiteUpdate.php?CaID=$sitecode'>Update</a>
                        <a href='CampsiteDelete.php?CaID=$sitecode'>Delete</a></div>";

                        echo "</div>";
                        }
                        
                    
                    ?>
                </div>
            </fieldset>
    </div>
    <!-- Campsite info listing end -->
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