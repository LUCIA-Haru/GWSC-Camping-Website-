<?php
include('Connection.php');

$AID=$_REQUEST['AID'];

$delete = "DELETE FROM Admins WHERE AdminID = '$AID'";
$ret = mysqli_query($connect,$delete);

if($ret){
    echo "<script>window.alert(The data are deleted successfully.)</script>";
    echo "<script>window.location='Admin.php'</script>";
}
else{
    echo "<script>window.alert(The error!)</script>";
}
