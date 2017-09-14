<?php include_once 'admin_includes/main_header.php'; ?>
<?php  
if (!isset($_POST['submit'])) {
  echo "";
} else {
  $title = $_POST['title'];
  $message = $_POST['message'];  
  

  $sql = "INSERT INTO mobile_push_notifications (`title`, `message`) VALUES ('$title', '$message')";
  if($conn->query($sql) === TRUE){
    echo "<script type='text/javascript'>window.location='mobile_push_notifications.php?msg=success'</script>";
  }else {
    echo "<script type='text/javascript'>window.location='mobile_push_notifications.php?msg=fail'</script>";
  }      
}
?>
      <div class="site-content">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="m-y-0">Send Notifications</h3>
          </div>
          <div class="panel-body">            
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form data-toggle="validator" method="POST" action="MobilePushNotifications/sendMultiplePush.php">
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Title</label>
                    <input type="text" name="title" class="form-control" id="form-control-2" placeholder="Title" data-error="Please enter Title" required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Description</label>
                    <textarea name="message" class="form-control" id="message" placeholder="Message" data-error="Please enter message." required></textarea>
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
