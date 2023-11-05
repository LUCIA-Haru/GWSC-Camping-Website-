<?php
include('Connection.php');
if(isset($_GET['PID'])){
    $PID = $_REQUEST['PID'];
    $select = "SELECT * FROM Pitch Where PitchID = '$PID'";

    $ret = mysqli_query($connect, $select);
    $row = mysqli_fetch_array($ret);
    
    $uPitchID = $row['PitchID'];
    $uPitchName = $row['PitchName'];
    $uPitchLocation = $row['PitchLocation'];
    $uPitchDescription= $row['PitchDescription']  ;
    $uPitchStatus = $row['PitchStatus']  ;
    $uPitchPricePerNight = $row['PitchPricePerNight']  ;
    $uLA_Names = $row['LA_Names']  ;
    $uFeature1Name = $row['Feature1Name']  ;
    // $uFeatureimg1 = $row['FeaturesImg1']  ;
    $uFeature2Name = $row['Feature2Name']  ;
    // $uFeatureimg2 = $row['FeaturesImg2']  ;
    $uFeaturesDescription = $row['FeaturesDescription']  ;
    $uFeaturesStatus= $row['FeaturesStatus']  ;
    $uAdditionalCost = $row['AdditionalCost']  ;
    
    

}
if (isset($_POST['btnUpdate'])) {
    $nPID = $_POST['txtPID'];
    $npName = $_POST['txtpname'];
    $nplocation = $_POST['txtplocation'];
    $npdescription = $_POST['txtpdescription'];
    $npStatus = $_POST['txtpStatus'];
    $npPrice = $_POST['txtpPrice'];
    $nLAName = $_POST['txtLAName'];
    $nF1name = $_POST['txtF1Name'];
    $nF2name = $_POST['txtF2Name'];
    $nFStatus = $_POST['txtFStatus'];
    $nFimgDes = $_POST['txtFimgDes'];
    $nAcost = $_POST['txtAcost'];

    $FIMg1=$_FILES['FIMg1']['name'];
    $folder = "UsedIMG/";
    $Ffilename1=$folder."_".$FIMg1;
    //CopyIMgtothefile
    $copy = copy($_FILES['FIMg1']['tmp_name'],$Ffilename1);
    if (!$copy){
        echo "<p>Cannot upload image</p>";
        exit();
    }
    $FIMg2=$_FILES['FIMg2']['name'];
    $folder = "UsedIMG/";
    $Ffilename2=$folder."_".$FIMg2;
    //CopyIMgtothefile
    $copy = copy($_FILES['FIMg2']['tmp_name'],$Ffilename2);
    if (!$copy){
        echo "<p>Cannot upload image</p>";
        exit();
    }


    $update = "Update Pitch Set PitchName = '$npName',PitchLocation= '$nplocation' , PitchDescription = '$npdescription',PitchStatus='$npStatus',PitchPricePerNight='$npPrice',LA_Names ='$nLAName',Feature1Name='$nF1name', Feature2Name='$nF2name',FeaturesDescription='$nFimgDes',FeaturesStatus='$nFStatus',AdditionalCost ='$nAcost',FeaturesImg1 = '$Ffilename1',FeaturesImg2= '$Ffilename2' WHERE PitchID = '$nPID '";
    $uret = mysqli_query($connect, $update);
    if ($uret) {
        echo "<script>window.alert('Updated Pitch Info Successfully.')</script>";
        echo "<script>window.location='Pitch.php'</script>'";
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
          <li><a href="Pitch.php" >Pitch</a></li>
          <li><a href="PitchUpdate.php" class="active">Pitch Update</a></li>
        </ul>
     </div>
    <!-- BreadCrumb Section End -->
    <!-- PitchUpdate section start -->
    <section class="dashboard">
        <div class="process container">
            <form action="PitchUpdate.php" method="POST" enctype="multipart/form-data">
                <div class="sub">
                    
                    <h3>Update the Pitch Info!</h3>
                </div>
                <div class="input-group">
                    <input type="hidden" name="txtPID" value="<?php echo $uPitchID; ?>">
                    
                    <div class="GWSCfield">
                        <div class="form-group">
                            <input type="text" class="formsinput" name="txtpname" placeholder="Pitch Names:" value="<?php echo "$uPitchName" ?>"required>
                        
                        </div>
                    </div>
                    <div class="GWSCfield">
                        <div class="form-group">
                            <input type="text" class="form-input" name="txtplocation" placeholder="Pitch Location:" value="<?php echo "$uPitchLocation" ?>" required>
                            
                        </div>
                    </div>
                    
                    <div class="GWSCfield">
                        <div class="form-group">
                            <input type="text" class="form-input" name="txtpdescription" placeholder="Descriptions:" value="<?php echo "$uPitchDescription" ?>"required>
                            
                        </div>
                    </div>
                    
                    
                    <div class="GWSCfield">
                        <div class="form-group">
                            <input type="text" class="form-input" name="txtpStatus" placeholder="Status:" value="<?php echo "$uPitchStatus" ?>" required>
                            
                        </div>
                    </div>
                    <div class="GWSCfield">
                        <div class="form-group">
                            <input type="text" class="form-input" name="txtpPrice" placeholder="Price Per Night:" value="<?php echo "$uPitchPricePerNight" ?>" required>
                            
                        </div>
                    </div>
                    
                    
                    
<b class="divider">---------<i class="fa-brands fa-canadian-maple-leaf"></i>---------</b>

                    <div class="GWSCfield">
                        <div class="form-group">
                            <input type="text" class="form-input" name="txtLAName"  placeholder="Local Local-Attractions Names:" value="<?php echo "$uLA_Names" ?>" required>
                            
                        </div>
                    </div>
                    
<b class="divider">---------<i class="fa-brands fa-canadian-maple-leaf"></i>---------</b>

                    <!-- features -->
                    
                    <div class="GWSCfield">
                        <div class="form-group">
                            <label class="gwslabelimg">Features IMG 1</label>
                            <input type="file" name="FIMg1" required/>
                        </div>
                    </div>
                    <div class="GWSCfield">
                        <div class="form-group">
                            <input type="text" class="form-input" name="txtF1Name"  placeholder="Features 1 Name:" value="<?php echo "$uFeature1Name" ?>" required>
                            
                        </div>
                    </div>
                    
                    <div class="GWSCfield">
                        <div class="form-group">
                            <label class="gwslabelimg">Features IMG 2</label>
                            <input type="file" name="FIMg2"  required/>
                        </div>
                    </div>
                    <div class="GWSCfield">
                        <div class="form-group">
                            <input type="text" class="form-input" name="txtF2Name"  placeholder="Features 2 Name:" value="<?php echo "$uFeature2Name" ?>"required>
                            
                        </div>
                    </div>
                    <div class="GWSCfield">
                        <div class="form-group">
                            <input type="text" class="form-input" name="txtFimgDes" placeholder="Features's IMG description" value="<?php echo "$uFeaturesDescription" ?>" required>
                            
                        </div>
                    </div>
                    <div class="GWSCfield">
                        <div class="form-group">
                            <input type="text" class="form-input" name="txtFStatus" placeholder="Features' Status:" value="<?php echo "$uFeaturesStatus" ?>" required>
                            
                        </div>
                    </div>
                    <div class="GWSCfield">
                        <div class="form-group">
                            <input type="text" class="form-input" name="txtAcost" placeholder="Additional Cost:" value="<?php echo "$uAdditionalCost" ?>" required>
                            
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
    
    <!-- PitchUpdate section end -->
    <!-- PitchType info listing start -->
    <div class="infolisting">
            <fieldset>
                <legend>Pitch Information Listing</legend>
                <?php $select = "SELECT * FROM Pitch";
                $ret = mysqli_query($connect, $select);
                $count = mysqli_num_rows($ret);

                if ($count==0) {
                    echo "<p>There is no Pitch's information</p>";
                }
                ?>
                <div class="alllist" >
                    <div class="listing">
                        <div class="Title">PitchID</div>
                        <div class="Title">PitchName</div>
                        
                        <div class="Title">PitchDescription</div>
                        
                        <div class="Title">PitchStatus</div>
                        <div class="Title">PitchPricePerNight</div>
                        
                        <div class="Title">LA_Names</div>
                        
                        
                        
                        
                        
                        <div class="Title">Features1NAME</div>
                        <div class="Title">FeaturesStatus</div>
                        <div class="Title">AdditionalCost</div>
                        
                        <div class="Title">action</div>
                        
                    </div>
                    <?php
                        for ($i=0; $i < $count ; $i++) {
                        $row = mysqli_fetch_array($ret);
                        $PitchID = $row['PitchID'];
                        $PitchName = $row['PitchName'];
                        
                        $PitchDescription= $row['PitchDescription']  ;
                        
                        $PitchStatus = $row['PitchStatus']  ;
                        $PitchPricePerNight = $row['PitchPricePerNight']  ;
                        
                        $LA_Names = $row['LA_Names']  ;
                        
                        
                        
                        
                        $FeaturesName = $row['Feature1Name']  ;
                        $FeaturesDescription = $row['FeaturesDescription']  ;
                        $FeaturesStatus= $row['FeaturesStatus']  ;
                        $AdditionalCost = $row['AdditionalCost']  ;
                        


                        echo "<div class= 'listing'>";
                        echo "<div class='items'>$PitchID</div>";
                        echo "<div class='items'>$PitchName</div>";
                        echo "<div class='items'>$PitchDescription</div>";
                        
                        
                        echo "<div class='items'>$PitchStatus</div>";
                        echo "<div class='items'>$PitchPricePerNight</div>";
                        
                        echo "<div class='items'>$LA_Names</div>";
                        
                        echo "<div class='items'>$FeaturesName</div>";
                        echo "<div class='items'>$FeaturesStatus</div>";
                        echo "<div class='items'>$AdditionalCost</div>";
                        


                        echo "<div class='items'>
                        <a href='PitchUpdate.php?PID=$PitchID'>Update</a>
                        <a href='PitchDelete.php?PID=$PitchID'>Delete</a></div>";

                        echo "</div>";
                        }
                        
                    
                    ?>
                </div>
            </fieldset>
    </div>
    <!-- PitchType info listing end -->
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