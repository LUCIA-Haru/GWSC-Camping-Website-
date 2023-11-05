<?php
session_start();
include("Connection.php");

if (!isset($_SESSION['Aid'])) {
    echo "<script>window.alert('Login Again!')</script>";
    echo "<script>window.loacation='AdminLogin.php'</script>";
}

if (isset($_POST['btnsubmit'])) {
    $siteName = $_POST['txtsitename'];
    $sitelocation = $_POST['txtsitelocation'];
    $siteDescriptions = $_POST['txtsiteDescriptions'];
    $siteStatus = $_POST['txtsiteStatus'];

    //For image
    $txtsiteimg1 = $_FILES['siteimg1']['name'];
    $folder = "UsedIMG/";
    $sfilename1 = $folder."_".$txtsiteimg1;
    //CopyIMgtothefile
    $copy = copy($_FILES['siteimg1']['tmp_name'],$sfilename1);
    if (!$copy){
        echo "<p>Cannot upload image</p>";
        exit();
    }
    //Check condition whether there is the same name or not
    $checksitename = "SELECT * From campsite WHERE 	SiteName = '$siteName'";
    $result=mysqli_query($connect,$checksitename);
    $count=mysqli_num_rows($result);

    if ($count>0) {
        echo "<script>window.alert('Campsite name is already existed!')</script>";
        echo "<script>window.loacation='Campsite.php'</script>";
    }
    else{
        //Insert Query for Campsite table
        $insert = "INSERT INTO campsite(SiteName,SiteLocation,SiteDescription,SiteImg,SiteStatus) VALUES('$siteName','$sitelocation','$siteDescriptions','$sfilename1','$siteStatus')";
        $query = mysqli_query($connect,$insert);
        if ($query) {
            echo "<script>window.alert('Added Campsite Info Successfullly')</script>";
            echo "<script>window.location='Campsite.php</script>'";
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
          <li><a href="AdminLogin.php" >AdminLogin</a></li>
          <li><a href="AdminDashboard.php">AdminDashboard</a></li>
          <li><a href="Campsite.php" class="active">Campsite</a></li>
        </ul>
     </div>
    <!-- BreadCrumb Section End -->
    <!-- Campsite section start -->
    <section class="card">
        <div class="process GWSCcard">
            <form action="Campsite.php" method="POST" enctype="multipart/form-data">
                <div class="sub">
                    
                    <h3>Manage the Campsites!</h3>
                </div>
                <div class="input-group">
                    <div class="GWSCfield">
                        <div class="form-group">
                                <input type="text" name="txtsitename" placeholder="Site Names:" class="formsinput"  required>
                        </div>
                            
                    </div>
                        <div class="GWSCfield">
                            <div class="form-group">
                                <input type="text" class="form-input" name="txtsitelocation" placeholder="Site Location:" required>
                                
                            </div>
                            
                        </div>
                        <div class="GWSCfield">
                            <div class="form-group">
                                <textarea type="text" name="txtsiteDescriptions"   placeholder="Description:" class="formsinput"  required></textarea>
                            </div>
                            
                        </div>
                        <div class="GWSCfield">
                            <!-- img -->
                            <div class="form-group">
                                <label class="gwslabelimg">Site IMG</label>
                                <input type="file" name="siteimg1" required/>
                            </div>
                            
                        </div>
                        
                        
                        <div class="GWSCfield">
                            <div class="form-group">
                                <input type="text" name="txtsiteStatus"  placeholder="Status:" class="formsinput"  required>
                            </div>
                            
                        </div>
                        
                    <div class="btn-gp">
                        <button name="btnsubmit" type="submit" class="btn-hover btn">Add</button>
                        <button type="reset" class="btn-hover btn">Reset</button>
                    </div>
                </div>
                
            </form>
        </div>
    </section>
    <!-- Campsite section end -->
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