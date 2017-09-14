<?php include_once 'admin_includes/main_header.php'; ?>
<?php
if (!isset($_POST['submit']))  {
            echo "fail";
} else  {
    //Save data into database
    $book_name = $_POST['book_name'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $isbn = $_POST['isbn'];
    $publish_year = $_POST['publish_year'];
    $language = $_POST['language'];
    $generate_type = $_POST['generate_type'];
    $no_of_pages = $_POST['no_of_pages'];
    $contact_no = $_POST['contact_no'];
    $price = $_POST['price'];
    /*$user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];*/
    $book_info = $_POST['book_info'];
    /*$avail_id = $_POST['availability_id'];
    $created_by = $_POST['created_by'];
    $created_at = $_POST['created_at'];*/
    $status = $_POST['status'];
        //save product images into product_images table
    $product_images1 = $_FILES['product_images']['name'];
    $file_tmp = $_FILES["product_images"]["tmp_name"];
    $file_destination = '../uploads/book_images/' . $product_images1;
    move_uploaded_file($file_tmp, $file_destination);
    
    $sql1 = "INSERT INTO products (`book_name`,`author`,`publisher`,`isbn`,`publish_year`,`status`,`language`,`generate_type`, `no_of_pages` ,`contact_no` , `price`, `book_info`, `book_image` ) VALUES ('$book_name','$author','$publisher', '$isbn','$publish_year','$status','$language','$generate_type','$no_of_pages','$contact_no','$price','$book_info','$product_images1')";
    $result1 = $conn->query($sql1);
    $last_id = $conn->insert_id;
    if( $result1 == 1){
    echo "<script type='text/javascript'>window.location='products.php?msg=success'</script>";
    } else {
       echo "<script type='text/javascript'>window.location='products.php?msg=fail'</script>";
    }
}
?>
		<div class="site-content">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="m-y-0">Books</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form data-toggle="validator" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Book Name</label>
                    <input type="text" class="form-control" id="form-control-2" name="book_name" placeholder="Book Name" data-error="Please enter Book Name." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Author</label>
                    <input type="text" class="form-control" id="form-control-2" name="author" placeholder="Author" data-error="Please enter Author Name." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Publisher</label>
                    <input type="text" class="form-control" id="form-control-2" name="publisher" placeholder="Publisher" data-error="Please enter Publisher Name." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Isbn</label>
                    <input type="text" class="form-control" id="form-control-2" name="isbn" placeholder="isbn" data-error="Please enter Isbn." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Publish Year</label>
                    <input type="text" class="form-control" id="form-control-2" name="publish_year" placeholder="Publish Year" data-error="Please enter Publish year." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Language</label>
                    <input type="text" class="form-control" id="form-control-2" name="language" placeholder="Language" data-error="Please enter Language." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Generate Type</label>
                    <input type="text" class="form-control" id="form-control-2" name="generate_type" placeholder="Generate Type" data-error="Please enter Generate Type." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Number Of Pages</label>
                    <input type="text" class="form-control" id="form-control-2" name="no_of_pages" placeholder="Number Of Pages" data-error="Please enter Number of Pages." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Contact Number</label>
                    <input type="text" class="form-control" id="form-control-2" name="contact_no" placeholder="Contact Number" data-error="Please enter Contact Number." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Price</label>
                    <input type="text" class="form-control" id="form-control-2" name="price" placeholder="Price" data-error="Please enter Price." required>
                    <div class="help-block with-errors"></div>
                  </div>
                   <!-- <div class="form-group">
                    <label for="form-control-2" class="control-label">User Id</label>
                    <input type="text" class="form-control" id="form-control-2" name="user_id" placeholder="User Id" data-error="Please enter User Id." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">User Name</label>
                    <input type="text" class="form-control" id="form-control-2" name="user_name" placeholder="User Name" data-error="Please enter User Name." required>
                    <div class="help-block with-errors"></div>
                  </div> -->
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Book Information</label>
                    <input type="text" class="form-control" id="form-control-2" name="book_info" placeholder="Book Information" data-error="Please enter Book Information." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-4" class="control-label">Book Image</label>
                    <img id="output" height="100" width="100"/>
                    <label class="btn btn-default file-upload-btn">
                    Choose file...
                          <input id="form-control-22" class="file-upload-input" type="file" accept="image/*" name="product_images" id="product_images"  onchange="loadFile(event)"  multiple="multiple" required >
                      </label>
                  </div>
                  <!-- <div class="form-group">
                    <label for="form-control-2" class="control-label">Availability Id</label>
                    <input type="text" class="form-control" id="form-control-2" name="availability_id" placeholder="Availability Id" data-error="Please enter Availability Id." required>
                    <div class="help-block with-errors"></div>
                  </div> -->
                  <?php $getStatus = getDataFromTables('user_status',$status=NULL,$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your status</label>
                    <select id="form-control-3" name="status" class="custom-select" data-error="This field is required." required>
                      <option value="">Select Status</option>
                      <?php while($row = $getStatus->fetch_assoc()) {  ?>
                          <option value="<?php echo $row['id']; ?>"><?php echo $row['status']; ?></option>
                      <?php } ?>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>
                  <!-- <div class="form-group">
                    <label for="form-control-2" class="control-label">Created By</label>
                    <input type="text" class="form-control" id="form-control-2" name="created_by" placeholder="Created By" data-error="Please enter Created By." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Created At</label>
                    <input type="text" class="form-control" id="form-control-2" name="created_at" placeholder="Created At" data-error="Please enter Created At." required>
                    <div class="help-block with-errors"></div>
                  </div> -->
                  <button type="submit" name="submit" value="Submit"  class="btn btn-primary btn-block">Submit</button>
                </form>
              </div>
            </div>
            <hr>
          </div>
        </div>
      </div>
      <?php include_once 'admin_includes/footer.php'; ?>
   <script src="js/tables-datatables.min.js"></script>











				          

				          

                  

      
       

      
      

      






