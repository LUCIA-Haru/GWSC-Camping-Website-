<?php
include('Connection.php');

$PID=$_REQUEST['PID'];

$delete = "DELETE FROM Pitch WHERE PitchID = '$PID'";
$ret = mysqli_query($connect,$delete);

if($ret){
    echo "<script>window.alert(The data are deleted successfully.)</script>";
    echo "<script>window.location='Pitch.php'</script>";
}
else{
    echo "<script>window.alert(The error!)</script>";
}

?>