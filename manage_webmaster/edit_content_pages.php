<?php include_once 'admin_includes/main_header.php'; ?>
<?php  
$id = $_GET['uid'];
 if (!isset($_POST['submit']))  {
            echo "";
    } else  {            

    $title = $_POST['title'];  
    $description = $_POST['description'];  
    $status = $_POST['status'];
    
        $sql = "UPDATE `content_pages` SET title = '$title', description = '$description', status='$status' WHERE id = '$id' ";
        if($conn->query($sql) === TRUE){
           echo "<script type='text/javascript'>window.location='content_pages.php?msg=success'</script>";
        } else {
           echo "<script type='text/javascript'>window.location='content_pages.php?msg=fail'</script>";
        }
    }   
    
?>
<div class="site-content">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="m-y-0">Content Pages</h3>
          </div>
          <div class="panel-body">            
            <div class="row">
              <?php $getContents = getDataFromTables('content_pages',$status=NULL,'id',$id,$activeStatus=NULL,$activeTop=NULL);
              $getContents1 = $getContents->fetch_assoc(); ?>		
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form data-toggle="validator" method="POST">

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Title</label>
                    <input type="text" name="title" class="form-control" id="form-control-2" data-error="Please enter a valid User Name" required value="<?php echo $getContents1['title'];?>">
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Description</label>
                    <textarea name="description" class="form-control" id="description" data-error="Please enter a valid email address." required><?php echo $getContents1['description'];?></textarea>
                    <div class="help-block with-errors"></div>
                  </div>
                  
                  <?php $getStatus = getDataFromTables('user_status',$status=NULL,$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your status</label>
                    <select id="form-control-3" name="status" class="custom-select" data-error="This field is required." required>
                      <option value="">Select Status</option>
                      <?php while($row = $getStatus->fetch_assoc()) {  ?>
                          <option <?php if($row['id'] == $getContents1['status']) { echo "Selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['status']; ?></option>
                      <?php } ?>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>                  
                
                  <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
              </div>
            </div>
            <hr>           
          </div>
        </div>
      </div>
  
<?php include_once 'admin_includes/footer.php'; ?>
<!-- Below script for ck editor -->
<!-- <script src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script> -->
<script src="//cdn.ckeditor.com/4.7.0/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'description' ); 
</script>
<style type="text/css">
    .cke_top, .cke_contents, .cke_bottom {
        border: 1px solid #333;
    }
</style>