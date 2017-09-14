<?php 
 include_once('admin_includes/config.php');
$id = $_GET['bid'];
$qry = "DELETE FROM mobile_push_notifications WHERE id ='$id'";
$result = $conn->query($qry);
if(isset($result)) {
   echo "<script>alert('Deleted Successfully');window.location.href='mobile_push_notifications.php';</script>";
} else {
   echo "<script>alert('Not Deleted');window.location.href='mobile_push_notifications.php';</script>";
}
?>