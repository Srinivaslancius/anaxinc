<?php include_once 'admin_includes/main_header.php'; ?>
<?php
 $getBannersData = getDataFromTables('company_logos',$status=NULL,$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);  
$id = $_GET['bid'];
//echo $music_number;
$target_dir = '../uploads/logo_images/';
$getImgUnlink = getImageUnlink('banner','company_logos','id',$id,$target_dir);
$qry = "DELETE FROM company_logos WHERE id ='$id'";
$result = $conn->query($qry);
if(isset($result)) {
   echo "<script>alert('Banner Deleted Successfully');window.location.href='company_logos.php';</script>";
} else {
   echo "<script>alert('Banner Not Deleted');window.location.href='company_logos.php';</script>";
}
?>