<?php
include('Connection.php');

$PTID=$_REQUEST['PTID'];

$delete = "DELETE FROM pitchType WHERE PTID = '$PTID'";
$ret = mysqli_query($connect,$delete);

if($ret){
    echo "<script>window.alert(The data are deleted successfully.)</script>";
    echo "<script>window.location='PitchType.php'</script>";
}
else{
    echo "<script>window.alert(The error!)</script>";
}

?>