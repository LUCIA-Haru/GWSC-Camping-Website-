<?php
session_start();
include("Connection.php");

if (!isset($_SESSION['Aid'])) {
    echo "<script>window.alert('Login Again!')</script>";
    echo "<script>window.location='AdminLogin.php'</script>";
}

if (isset($_POST['btnsubmit'])) {
    $ptName = $_POST['txtptname'];
    $ptDescriptions = $_POST['textptdes'];
    $ptStatus = $_POST['txtptStatus'];
    $pet = $_POST['txtpet'];
    $swimming = $_POST['txtswim'];

    //Check condition whether there is the same name or not
    $checkptname = "SELECT * From pitchtype WHERE PTName = '$ptName'";
    $result=mysqli_query($connect,$checkptname);
    $count=mysqli_num_rows($result);

    if ($count>0) {
        echo "<script>window.alert('PitchType name is already existed!')</script>";
        echo "<script>window.location='PitchType.php'</script>";
    }
    else{
        //Insert Query for Campsite table
        echo $insert = "INSERT INTO pitchtype(PTName,PTDescription,PTStatus,PetFriendly,Swimming) VALUES('$ptName','$ptDescriptions','$ptStatus','$pet','$swimming')";
        $query = mysqli_query($connect,$insert);
        if ($query) {
            echo "<script>window.alert('Added PitchType Info Successfully.')</script>";
            echo "<script>window.location='PitchType.php'</script>'";
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
          <li><a href="PitchType.php" class="active">PitchType</a></li>
        </ul>
     </div>
    <!-- BreadCrumb Section End -->
    <!-- PitchType section start -->
    <section class="card">
        <div class="process  GWSCcard">
            <form action="PitchType.php" method="POST">
                <div class="sub">
                    
                    <h3>Manage the PitchType!</h3>
                </div>
                
                
                <div class="input-group">
                    <div class="GWSCfield">
                        <div class="form-group">
                                <input type="text" name="txtptname"  placeholder="PitchType Names:" class="formsinput"  required>
                        </div>
                            
                    </div>
                        <div class="GWSCfield">
                            <div class="form-group">
                                <textarea type="text" class="form-input" name="textptdes" placeholder="Description:" required></textarea>
                                
                            </div>
                            
                        </div>
                        <div class="GWSCfield">
                            <div class="form-group">
                                <input type="text" name="txtptStatus"  placeholder="Status:" class="formsinput"  required>
                            </div>
                            
                        </div>
                        <div class="GWSCfield">
                            <div class="form-group">
                                <input type="text" name="txtpet"  placeholder="Pet Friendly:" class="formsinput"  required>
                            </div>
                            
                        </div>
                        <div class="GWSCfield">
                            <div class="form-group">
                                <input type="text" name="txtswim"  placeholder="Swimming:" class="formsinput"  required>
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
    <!-- PitchType section end -->
    <!-- PitchType info listing start -->
    <div class="infolisting">
        <fieldset>
            <legend>PitchType Information Listing</legend>
            <?php $select = "SELECT * FROM PitchType";
            $ret = mysqli_query($connect, $select);
            $count = mysqli_num_rows($ret);

            if ($count==0) {
                echo "<p>There is no PitchType's information</p>";
            }
            ?>
            <div class="alllist">
                <div class="listing">
                    <div class="Title">PTID</div>
                    <div class="Title">PTName</div>
                    <div class="Title">PT_Description</div>
                    <div class="Title">PTStatus</div>
                    <div class="Title">PetFriendly</div>
                    <div class="Title">Swimming</div>
                    <div class="Title">action</div>
                    
                </div>
                <?php
                    for ($i=0; $i < $count ; $i++) {
                    $row = mysqli_fetch_array($ret);
                    $PTID = $row['PTID'];
                    $PTName = $row['PTName'];
                    $PT_Description = $row['PTDescription'];
                    $PTStatus= $row['PTStatus']  ;
                    $PetFriendly = $row['PetFriendly']  ;
                    $swim = $row['Swimming']  ;


                    echo "<div class= 'listing' >";
                    echo "<div class='items'>$PTID</div>";
                    echo "<div class='items'>$PTName</div>";
                    echo "<div class='items'>$PT_Description</div>";
                    echo "<div class='items'>$PTStatus</div>";
                    echo "<div class='items'>$PetFriendly</div>";
                    echo "<div class='items'>$swim</div>";


                    echo "<div class='items'>
                    <a href='PitchTypeUpdate.php?PTID=$PTID'>Update</a>
                    <a href='PitchTypeDelete.php?PTID=$PTID'>Delete</a></div>";

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