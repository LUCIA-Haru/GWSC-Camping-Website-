<?php
session_start();
include("Connection.php");

if (!isset($_SESSION['Aid'])) {
    echo "<script>window.alert('Login Again!')</script>";
    echo "<script>window.loacation='AdminLogin.php'</script>";
}

if (isset($_POST['btnsubmit'])) {
    $pName = $_POST['txtpname'];
    $plocation = $_POST['txtplocation'];
    $pdescription = $_POST['txtpdescription'];
    $pduration = $_POST['txtpDuration'];
    $pStatus = $_POST['txtpStatus'];
    $pPrice = $_POST['txtPPrices'];
    $LAName = $_POST['txtLAName'];
    $LAimg1Des = $_POST['txtLAimg1Des'];
    $LAimg2Des = $_POST['txtLAimg2Des'];
    $LAimg3Des = $_POST['txtLAimg3Des'];
    $F1name = $_POST['txtF1Name'];
    $F2name = $_POST['txtF2Name'];
    $FStatus = $_POST['txtFStatus'];
    $FimgDes = $_POST['txtFimgDes'];
    $Acost = $_POST['txtAcost'];
    $PitchTypes = $_POST['cboPT'];
    $Site = $_POST['cbosite'];

   
    //For image
    $pimg1=$_FILES['Pimg1']['name'];
    $folder = "UsedIMG/";
    $pfilename1=$folder."_".$pimg1;
    //CopyIMgtothefile
    $copy = copy($_FILES['Pimg1']['tmp_name'],$pfilename1);
    if (!$copy){
        echo "<p>Cannot upload image</p>";
        exit();
    }
    
    $LAimg1=$_FILES['LAimg1']['name'];
    $folder = "UsedIMG/";
    $LAfilename1=$folder."_".$LAimg1;
    //CopyIMgtothefile
    $copy = copy($_FILES['LAimg1']['tmp_name'],$LAfilename1);
    if (!$copy){
        echo "<p>Cannot upload image</p>";
        exit();
    }
    $LAimg2=$_FILES['LAimg2']['name'];
    $folder = "UsedIMG/";
    $LAfilename2=$folder."_".$LAimg2;
    //CopyIMgtothefile
    $copy = copy($_FILES['LAimg2']['tmp_name'],$LAfilename2);
    if (!$copy){
        echo "<p>Cannot upload image</p>";
        exit();
    }
    $LAimg3=$_FILES['LAimg3']['name'];
    $folder = "UsedIMG/";
    $LAfilename3=$folder."_".$LAimg3;
    //CopyIMgtothefile
    $copy = copy($_FILES['LAimg3']['tmp_name'],$LAfilename3);
    if (!$copy){
        echo "<p>Cannot upload image</p>";
        exit();
    }

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
    
    

    //Check condition whether there is the same name or not
    $checkpname = "SELECT * From pitch WHERE 	PitchName = '$pName'";
    $result=mysqli_query($connect,$checkpname);
    $count=mysqli_num_rows($result);

    if ($count>0) {
        echo "<script>window.alert('Pitch name is already existed!')</script>";
        echo "<script>window.location='Pitch.php'</script>";
    }
    else{
        //Insert Query for Campsite table
        $insert = "INSERT INTO pitch(PitchName,PitchLocation,PitchDescription,PitchDuration,PitchStatus,PitchPricePerNight,PitchImg,LA_Names,LA_ImgURL1,LA_ImgDescription1,LA_ImgURL2,LA_ImgDescription2,LA_ImgURL3,LA_ImgDescription3,Feature1Name,FeaturesImg1,Feature2Name,FeaturesImg2,FeaturesDescription,FeaturesStatus,AdditionalCost,PTID,SiteCodeNo) VALUES('$pName','$plocation','$pdescription','$pduration','$pStatus','$pPrice','$pfilename1','$LAName','$LAfilename1','$LAimg1Des','$LAfilename2','$LAimg2Des','$LAfilename3','$LAimg3Des','$F1name','$Ffilename1','$F2name','$Ffilename2','$FimgDes','$FStatus','$Acost','$PitchTypes','$Site')";
        $query = mysqli_query($connect,$insert);
        if ($query) {
            echo "<script>window.alert('Added PitchType Info Successfully.')</script>";
            echo "<script>window.location='PitchType.php</script>'";
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
          <li><a href="Pitch.php" class="active">Pitch</a></li>
        </ul>
     </div>
    <!-- BreadCrumb Section End -->
    <!-- PitchType section start -->
    <section class="card">
        <div class="process  GWSCcard">
            <form action="Pitch.php" method="POST" enctype="multipart/form-data">
                <div class="sub">
                    
                    <h3>Manage the Pitch!</h3>
                </div>
                <div class="input-group">
                    <div class="GWSCfield">
                        <div class="form-group">
                            <input type="text" class="form-input" name="txtpname" placeholder="Pitch Names:" required>
                        
                        </div>
                    </div>
                    <div class="GWSCfield">
                        <div class="form-group">
                            <input type="text" class="form-input" name="txtplocation" placeholder="Pitch Location:" required>
                            
                        </div>
                    </div>
                    
                    <div class="GWSCfield">
                        <div class="form-group">
                            <input type="text" class="form-input" name="txtpdescription" placeholder="Descriptions:" required>
                            
                        </div>
                    </div>
                    <div class="GWSCfield">
                        <div class="form-group">
                            <input type="text" class="form-input" name="txtpDuration" placeholder="Durations:" required>
                            
                        </div>
                    </div>
                    
                    <div class="GWSCfield">
                        <div class="form-group">
                            <input type="text" class="form-input" name="txtpStatus" placeholder="Status:" required>
                            
                        </div>
                    </div>
                    <div class="GWSCfield">
                        <div class="form-group">
                            <input type="text" class="form-input" name="txtPPrices" placeholder="Price Per Night:" required>
                            
                        </div>
                    </div>
                    <!-- img -->
                    <div class="GWSCfield">
                        <div class="form-group">
                            <label class="gwslabelimg">Pitch IMG</label>
                            <input type="file" name="Pimg1" required/>
                        </div>
                    </div>
                    
                    
<b class="divider">---------<i class="fa-brands fa-canadian-maple-leaf"></i>---------</b>

                    <div class="GWSCfield">
                        <div class="form-group">
                            <input type="text" class="form-input" name="txtLAName"  placeholder="Local Local-Attractions Names:" required>
                            
                        </div>
                    </div>
                    
                    <!-- LAimg -->
                    <div class="GWSCfield">
                        <div class="form-group">
                            <label class="gwslabelimg">Local-Attractions IMG 1</label>
                            <input type="file" name="LAimg1" required/>
                        </div>
                    </div>
                    <div class="GWSCfield">
                        <div class="form-group">
                            <input type="text" class="form-input" name="txtLAimg1Des" placeholder="Local-Attractions IMG 1's description" required>
                            
                        </div>
                    </div>
                    <div class="GWSCfield">
                        <div class="form-group">
                            <label class="gwslabelimg">Local-Attractions IMG 2</label>
                            <input type="file" name="LAimg2" required/>
                        </div>
                    </div>
                    <div class="GWSCfield">
                        <div class="form-group">
                            <input type="text" class="form-input" name="txtLAimg2Des" placeholder="Local-Attractions IMG 2's description" required>
                            
                        </div>
                    </div>
                    <div class="GWSCfield">
                        <div class="form-group">
                            <label class="gwslabelimg">Local-Attractions IMG 3</label>
                            <input type="file" name="LAimg3" required/>
                        </div>
                    </div>
                    <div class="GWSCfield">
                        <div class="form-group">
                            <input type="text" class="form-input" name="txtLAimg3Des" placeholder="Local-Attractions IMG 3's description" required>
                            
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
                            <input type="text" class="form-input" name="txtF1Name"  placeholder="Features 1 Name:" required>
                            
                        </div>
                    </div>
                    
                    <div class="GWSCfield">
                        <div class="form-group">
                            <label class="gwslabelimg">Features IMG 2</label>
                            <input type="file" name="FIMg2" required/>
                        </div>
                    </div>
                    <div class="GWSCfield">
                        <div class="form-group">
                            <input type="text" class="form-input" name="txtF2Name"  placeholder="Features 2 Name:" required>
                            
                        </div>
                    </div>
                    <div class="GWSCfield">
                        <div class="form-group">
                            <input type="text" class="form-input" name="txtFimgDes" placeholder="Features's IMG description" required>
                            
                        </div>
                    </div>
                    <div class="GWSCfield">
                        <div class="form-group">
                            <input type="text" class="form-input" name="txtFStatus" placeholder="Features' Status:" required>
                            
                        </div>
                    </div>
                    <div class="GWSCfield">
                        <div class="form-group">
                            <input type="text" class="form-input" name="txtAcost" placeholder="Additional Cost:" required>
                            
                        </div>
                    </div>
                    
<b class="divider">---------<i class="fa-brands fa-canadian-maple-leaf"></i>---------</b>

                    <div class="GWSCfield">
                        <div class="form-group newinput">
                            <label>Choose CampSite's Name</label>
                                <select name="cbosite">
                                    <option>Choose</option>
                                    <?php
                                    $select = "Select * from campsite";
                                    $run = mysqli_query($connect, $select);
                                    $count = mysqli_num_rows($run);
                                    for ($i=0; $i < $count; $i++) {
                                        
                                        $row = mysqli_fetch_array
                                        ($run);//to take query statments
                                        $SiteCodeNo=$row['SiteCodeNo'];
                                        $SiteName=$row['SiteName'];
                                        echo "<option value='$SiteCodeNo'>$SiteName</option>";
                                    }
                                    ?>
                                </select>
                        </div>
                    </div>
                    <div class="GWSCfield">
                        <div class="form-group newinput">
                            <label>Choose PitchType Name</label>
                            <select name="cboPT">
                                <option>Choose</option>
                                <?php
                                $select = "Select * from PitchType";
                                $run = mysqli_query($connect, $select);
                                $count = mysqli_num_rows($run);
                                for ($i=0; $i < $count; $i++) {
                                    
                                    $row = mysqli_fetch_array
                                    ($run);//to take query statments
                                    $PTID=$row['PTID'];
                                    $PTname = $row['PTName'];
                                    echo "

                                    <option value='$PTID'>$PTname</option>";
                                }
                                ?>
                            </select>
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
    <!-- Pitch section end -->
    <hr>
    
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
            
            <hr class="divider">
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