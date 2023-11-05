<?php
include('Connection.php');

$CaID=$_REQUEST['CaID'];

$delete = "DELETE FROM Campsite WHERE SiteCodeNo = '$CaID'";
$ret = mysqli_query($connect,$delete);

if($ret){
    echo "<script>window.alert(The data are deleted successfully.)</script>";
    echo "<script>window.location='Campsite.php'</script>";
}
else{
    echo "<script>window.alert(The error!)</script>";
}

?>